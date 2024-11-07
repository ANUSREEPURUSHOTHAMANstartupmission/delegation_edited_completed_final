<?php
 
namespace App\Http\Livewire\Admin\Events;

use App\Exports\ActivityParticipant;
use App\Models\Application;
use App\Models\User;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Livewire\BasePage;
use App\Models\Remark;

class ApplicationShow extends BasePage
{
    public $model;
    public $application;


    public function mount(Application $application){
       
        $this->application = $application;

    }

    public function selectstpsecond(Application $application){
        $this->emit('openModal', 'admin.events.application-nextround', [ 'model' => $this->application->hid ]);
    }

    public function selectstp(Application $application){
        $this->emit('openModal', 'admin.events.application-select', [ 'model' => $this->application->hid ]);
    }

    public function rejectstp(Application $application){
        $this->emit('openModal', 'admin.events.rejected-form', [ 'model' => $this->application->hid ]);
    }

    public function on_hold(Application $application){
        $this->emit('openModal', 'admin.events.onhold', [ 'model' => $this->application->hid ]);
    }

    public function recommended(Application $application){
        $this->emit('openModal', 'admin.events.recommended-form', [ 'application' => $this->application->hid ]);

    }

    public function notrecommended(Application $application){
        $this->emit('openModal', 'admin.events.notrecommended-form', [ 'application' => $this->application->hid ]);

    }

    public function onhold(Application $application){
        $this->emit('openModal', 'admin.events.onhold-form', [ 'application' => $this->application->hid ]);

    }
   

    public function render()
    {
        return view('livewire.show-application');
    }

}