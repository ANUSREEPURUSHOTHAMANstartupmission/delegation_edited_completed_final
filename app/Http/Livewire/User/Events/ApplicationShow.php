<?php
 
namespace App\Http\Livewire\User\Events;

use App\Exports\ActivityParticipant;
use App\Models\Application;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Livewire\BasePage;

class ApplicationShow extends BasePage
{
    public $model;
    public $application;


    public function mount(Application $application){
       
        $this->application = $application;

    }

  public function render()
    {
        return view('livewire.usershow-application');
    }

}