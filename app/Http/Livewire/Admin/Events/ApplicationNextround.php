<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Application;
use App\Notifications\ApplicationRejectedNotification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;


class ApplicationNextround extends ModalForm {

  public $title = "Application";
    
  public $model_type = Application::class;
  public $permission = "admin:application:";

  public function mount(?Application $model){
    $this->model = $model;
    $this->mount_form();
  }

  protected function getFormSchema(): array 
  {
      return [
        
              Textarea::make('remark_select')->label('Remarks')
              ->rows(2)
              ->cols(20)->required(),
      ];
  }

  public function beforeUpdate($data){
    $this->model->status = "Selected for Next Round";
    $this->model->save();
}

}