<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Application;
use Livewire\Component;
use App\Models\Events;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;



class DashboardPage extends Component
{
    public $title = "Admin";
    public $permission = "admin:dashboard:";
    public $eventdetails;
    public $selected;
    public $rejected;
    public $application;
    public $totalfee;
    public $upcomingevent;
    public $up_ap;
    public $up_selected;
    public $up_rejected;
    public $payment;
    public $up_payment;


    public function mount()
    {
      $currentDate = Carbon::now()->toDateString();

      $this->eventdetails = Events::count();
      $this->application = Application::count();
      $this->selected = Application::query()->where('status','Selected')->count();
      $this->rejected = Application::query()->where('status','Rejected')->count();
      $this->payment = Application::query()->where('paymentstatus','Payment Completed')->count();

      
      $this->upcomingevent=Events::query()
      ->whereDate('startdate', '>=', $currentDate)
      ->count();
      

      $this->up_ap = Events::query()
      ->join('applications', 'events.id', '=', 'applications.event_id')
      ->where('startdate', '>=', $currentDate)
      ->count();

      $this->up_selected = Events::query()
      ->join('applications', 'events.id', '=', 'applications.event_id')
      ->where('startdate', '>=', $currentDate)
      ->where('applications.status', '=', 'Selected')
      ->count();

      $this->up_rejected = Events::query()
      ->join('applications', 'events.id', '=', 'applications.event_id')
      ->where('startdate', '>=', $currentDate)
      ->where('applications.status', '=', 'Rejected')
      ->count();


      $this->up_payment = Events::query()
      ->join('applications', 'events.id', '=', 'applications.event_id')
      ->where('startdate', '>=', $currentDate)
      ->where('applications.paymentstatus', '=', 'Payment Completed')
      ->count();




      $this->totalfee = Events::query()
      ->join('applications', 'events.id', '=', 'applications.event_id')
      ->where('applications.paymentstatus', 'Payment Completed')
      ->selectRaw('SUM(CAST(fee AS NUMERIC)) AS total_fee')
      ->pluck('total_fee')
      ->first();
  
    }
  
    public function render()
    {
        return view('livewire.admin-page');
    }

}
