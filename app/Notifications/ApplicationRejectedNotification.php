<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Startup; 
use App\Models\Events; 


class ApplicationRejectedNotification extends Notification
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
                    ->subject('Application Status Update for '.$event->name)
                    ->line('Thank you for your application to our International Delegation Program. We appreciate the time and effort you invested in applying.')
                    ->line('After careful consideration, we are sorry to inform you that your application has not been selected.')
                    ->line('This decision was not easy, as we received many applications.')
                    ->line("Please note that this decision is not a reflection of your startup's ability and potential. We encourage you to apply again for future opportunities with Kerala Startup Mission.")
                    ->line("We sincerely appreciate your interest in our program and wish you the very best in your future endeavours.")
                    ->line("Thank you once again for considering our International Delegation Program.");
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
