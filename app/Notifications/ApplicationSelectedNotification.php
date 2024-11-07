<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use Razorpay\Api\Api;
use App\Models\Application; 
use App\Models\Startup; 
use Illuminate\Bus\Queueable;
use App\Models\Events;

class ApplicationSelectedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //  $apikey=env('RAZORPAY_KEY');
        //  $secretkey=env('RAZORPAY_SECRET');

        //  $startup = Startup::find($this->model->startup_id);
        //  $event = Events::find($this->model->event_id);

        
        //  $api = new Api($apikey, $secretkey);
 
        //  $paymentLinkData = [
        //      'amount' => $event->fee * 100,
        //      'currency' => 'INR',
        //      'reference_id' => 'APP-'.$this->model->id,
        //      'description' => $event->name,
        //      'customer' => [
        //          'name' => $startup->founder_name,
        //          'email' => $notifiable->email,
        //          'contact' => $startup->contact_num,
        //      ],
             
             
        //      'notes' => [
        //          'startupname' => $startup->name,
        //          'eventname'=>$event->name,
        //      ]
            
        //  ];
 
        //  $paymentLink = $api->paymentLink->create($paymentLinkData);
 
        //  $this->model->paymentlink = $paymentLink->id;
        //  $this->model->save();
            $startup = Startup::find($this->model->startup_id);
            $event = Events::find($this->model->event_id);
         return (new MailMessage)
             ->subject("Application Status Update for. $event->name")
             ->line('Congratulations on your selection for our International Delegation Program.')
             ->line("We're pleased to have you join us for this opportunity.")
             ->line("If you have any questions about the program, please contact us at 9037033341.")
             ->line("We look forward to your participation.")
             ->action('Pay Now', route('user.application.show',$this->model->hid))
             ->line('Note: The next process will commence only after the registration fee has been received.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
