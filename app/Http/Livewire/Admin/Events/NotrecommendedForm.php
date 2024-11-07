<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Application;
use App\Models\Remark;
use App\Notifications\ApplicationRejectedNotification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;

class NotrecommendedForm extends ModalForm {

    public $application;

  public $title = "Add Remarks";
    
  public $model_type = Remark::class;
  public $permission = "admin:remark:";

  public function mount(Application $application, ?Remark $model){
    $this->model = $model;
    $this->application = $application;
    $this->mount_form();
  }

  protected function getFormSchema(): array 
  {
      return [
        
              Textarea::make('remark')
              ->rows(2)
              ->cols(20)->required(),
      ];
  }

  public function beforeCreate($data)
  {
    $this->model->type="Not Recommended";
    $this->model->application_id=$this->application->id;
    $this->model->user_id = auth()->user()->id;
    $this->model->save();
  }

  public function afterCreate($data)
  {
    Notification::make() 
    ->title('Remarks added successfully')
    ->success()
    ->send();
  }
 

}