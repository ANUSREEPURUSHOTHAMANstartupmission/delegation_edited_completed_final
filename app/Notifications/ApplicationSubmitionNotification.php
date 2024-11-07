<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Startup; 
use App\Models\Events; 


class ApplicationSubmitionNotification extends Notification
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

        $startup = Startup::find($this->model->startup_id);
        $event = Events::find($this->model->event_id);

        return (new MailMessage)
                    ->subject("Application Submitted. $event->name")
                    ->line('Thank you for submitting your application for our International Delegation Program. We appreciate your interest in joining this exciting opportunity.')
                    ->line('We have successfully received your application, and our team will carefully review all submissions to assess each startup to participate in the delegation.')
                    ->line("You will receive notification regarding the status of your application once the selection process is completed.")
                    ->line("Thank you once again for applying. We look forward to the possibility of having you join us on this international delegation.");
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
