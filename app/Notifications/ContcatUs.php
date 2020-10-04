<?php

namespace App\Notifications;

use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactUs extends Notification implements ShouldQueue
// class verifyEmail extends Notification 

{
    use Queueable;

    public $question;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Question $question)
    {
        $this->question =$question;
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

    /**php 
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
                    ->line('A question you asked on our application has been answered.')
                    ->line('Please click the button below to view the answer to your question.')
                    ->action('View Answer', $url)
                    ->line('If you did not ask the question, no further action is required.');
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
