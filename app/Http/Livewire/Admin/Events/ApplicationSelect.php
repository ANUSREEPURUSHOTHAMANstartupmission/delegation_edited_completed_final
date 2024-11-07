<?php

namespace App\Http\Livewire\Admin\Events;

use App\Http\Livewire\ModalForm;
use App\Models\Application;
use App\Models\Events;
use App\Models\User;
use App\Notifications\ApplicationSelectedNotification;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Razorpay\Api\Api;
use Filament\Notifications\Notification;


class ApplicationSelect extends ModalForm {

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
        
              Textarea::make('remark_select')->label('Selection Remarks')
              ->rows(2)
              ->cols(20)->required(),
      ];
  }

  public function beforeUpdate($data)
  {
    $this->model->status = "Selected";
    $this->model->save();

    $event = Events::find($this->model->event_id);
   
    $orderData = 
    [
      'receipt'         => 'APP-'.$this->model->hid,
      'amount'          => $event->fee *100, 
      'currency'        => 'INR'
    ];
  
    $apikey=env('RAZORPAY_KEY');
    $secretkey=env('RAZORPAY_SECRET');
    $api = new Api($apikey, $secretkey);

    $razorpayOrder = $api->order->create($orderData);
    $this->model->orderid = $razorpayOrder->id;
    $this->model->save();
    

    $this->model->startup->user->notify(new ApplicationSelectedNotification($this->model));

  }


  public function afterUpdate($data)
  {
    Notification::make() 
    ->title('Application Status Updated')
    ->success()
    ->send();
  }


}