<?php

namespace App\Http\Livewire\User\Dashboard;

use Livewire\Component;
use App\Models\Application;
use App\Models\Events;
use App\Models\Startup;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Builder;



class DashboardPage extends Component
{
    public $title = "User";
    public $permission = "user:dashboard:";
    public $applications;
    public $startup;
    public $selected;
    public $completed;
    public $paid;
    public $paymentstatus;
    public $eventdetails;
    public $totalfee;
    public $rejected;
    public $payment_completed;
    public $up_events;
    public $completed_events;

    public function mount()
    {
     

      $user = auth()->user();
      $user->user;
      $startup = Startup::where('user_id', auth()->id())->first();

      $this->eventdetails = Events::count();

      $this->applications=Application::where('startup_id',$startup->id)->count();

      $this->selected=Application::where('startup_id',$startup->id)->where('status','Selected')->count();
      
      $this->rejected=Application::where('startup_id',$startup->id)->where('status','Rejected')->count();

      $this->paymentstatus=Application::where('startup_id',$startup->id)->where('paymentstatus','Payment Completed')->count();

      $this->totalfee = Application::query()
      ->join('events', 'events.id', '=', 'applications.event_id')
      ->where('applications.paymentstatus', 'Payment Completed')
      ->where('applications.startup_id', $startup->id)
      ->selectRaw('SUM(CAST(events.fee AS NUMERIC)) AS total_fee')
      ->pluck('total_fee')
      ->first();


      $this->payment_completed = Application::query()
      ->join('events', 'events.id', '=', 'applications.event_id')
      ->where('applications.paymentstatus', 'Payment Completed')
      ->where('applications.startup_id', $startup->id)
      ->count();

      $currentDate = Carbon::now()->toDateString();

       $this->up_events = Events::whereHas('applications',  function($q) use($startup,$currentDate){
        return $q->where('enddate', '>=',$currentDate)->where('startup_id', $startup->id)->where('paymentstatus', 'Payment Completed');
      })->get();

      $this->completed_events = Events::whereHas('applications',  function($q) use($startup,$currentDate){
        return $q->where('enddate', '<=',$currentDate)->where('startup_id', $startup->id)->where('paymentstatus', 'Payment Completed');
      })->get();
      
    }
  
    public function render()
    {
        return view('livewire.user-dashboard');
    }

}
 