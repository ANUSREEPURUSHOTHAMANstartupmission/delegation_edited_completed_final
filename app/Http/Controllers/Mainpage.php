<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Startup;

use App\Models\Application;
use App\Models\Director;
use App\Models\Product;
use App\Models\UpcomingEvent;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Notifications\SelectedFormNotification;

class Mainpage extends Controller

{
    public $title = "Admin";
    public $permission = "admin:dashboards:";
    public $eventdetails;
   
    public function index()
    {
        $this->eventdetails = Events::orderBy('lastdate', 'desc')->paginate(10);;

        $currentDate = Carbon::now()->toDateString();
        foreach ($this->eventdetails as $event) {
        
            $lastDate = $event->lastdate;

            if ($currentDate <= $lastDate) {
                $event->status = "Application Open";
            } else {
                $event->status = "Application Closed";
                
            }
        }

        return view('index', ['eventdetails' => $this->eventdetails]);

    }


    public function show(Events $event)
        {
            // $event = Events::findOrFail($id);
            $today = Carbon::today();

            $lastDate = Carbon::createFromFormat('Y-m-d', $event->lastdate);

            if ($today <= $lastDate) {
                $event->status = "Application Open";
            } else {
                $event->status = "Application Closed";
                
            }
            return view('event_details', ['event' => $event]);
        }

    public function apply(Events $event)
        {
            // $event = Events::findOrFail($id);

            $startup = Startup::where('user_id', auth()->id())->first();

            if($startup)
            {
                $application=Application::where('event_id',$event->id)->where('startup_id',$startup->id)->count();
                
                $directors=Director::where('startup_id',$startup->id)->get();
                
                $products=Product::where('startup_id',$startup->id)->get();


                if ($application){
                   
                    Session::flash('success', 'You have already applied for this delegation! Please login to your account to view the updates.');

                    return redirect()->back();
                    // return redirect()->back()->with('status', 'You have already applied for this delegation! Please login to your account to view the updates.');

                }  
                
                Session::flash('warning', 'Please log in to our Unique ID portal to update your startup details.');

                return view('applynow', compact('event', 'startup','application','directors','products'));

            }
            else{
                
                Session::flash('warning', 'Only Startups with KSUM Uniqueid can apply');
                return redirect()->back();
                // return redirect()->back()->with('status', 'Only Startups with KSUM Uniqueid can apply');

            }
        }

    public function submitdata(Request $request, $id)
        {

            $validator = Validator::make($request->all(), [
                'startup_stage' => 'required',
                'technology_sector' => 'required',
                'business_sector' => 'required',
                'revenue_generated' => 'required',
                'why_participate' => 'required',
                'accept_terms' => 'required',
                'startup_id' => 'required',
                'investment_raised'=>'required'
            ]);
        
            if ($validator->fails()) {
                dd($validator->errors()->all());
            }
        
            $validatedData = $validator->validated();
           
          

            $application = new Application();

            $application->event_id = $id;
            $application->startup_stage = $validatedData['startup_stage'];
            $application->technology_sector = $validatedData['technology_sector'];
            $application->business_sector = $validatedData['business_sector'];
            $application->revenue_generated = $validatedData['revenue_generated'];
            $application->why_participate = $validatedData['why_participate'];
            $application->willing_to_pay = $validatedData['accept_terms'];
            $application->startup_id = $validatedData['startup_id'];
            $application->investment_raised = $validatedData['investment_raised'];


            $application->save();
        
            return redirect()->route('index');
        }



    public function paymentdata(Request $request)
    {
        $apikey=env('RAZORPAY_KEY');
        $secretkey=env('RAZORPAY_SECRET');

        $validator = Validator::make($request->all(), [
            'razorpay_payment_id'=> 'required',
            'razorpay_order_id'=> 'required' ,
            'razorpay_signature'=> 'required'
           
        ]);

        $validatedData = $validator->validated();

        $api = new Api($apikey, $secretkey);

        $api->utility->verifyPaymentSignature(array('razorpay_order_id' => $validatedData['razorpay_order_id'], 'razorpay_payment_id' => $validatedData['razorpay_payment_id'], 'razorpay_signature' => $validatedData['razorpay_signature']));

        if ($api)
        {
            $applicationid = Application::where('orderid',$validatedData['razorpay_order_id'])->first();
            $application = Application::where('orderid',$validatedData['razorpay_order_id'])->first();

            $application->paymentid=$validatedData['razorpay_payment_id'];
            $application->signature=$validatedData['razorpay_signature'];
            $application->paymentstatus="Payment Completed";

            $application->save();
            $application->startup->user->notify(new SelectedFormNotification($application));

            return redirect()->route("user.application.show", ['application' => $applicationid->hid]);

        }
        return redirect()->back();
    }


    public function calendardata()
    {
        $events = UpcomingEvent::all()->map(function ($event) {
            return [
                'title' => $event->name,
                'start' => $event->start_date->format('Y-m-d'),
                'end' => $event->end_date->format('Y-m-d'),
            ];
        })->toArray();

        return view('calendar', ['events' => json_encode($events)]);
    }

}
