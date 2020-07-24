<?php

namespace App\Notifications;

use App\Answer;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class repliedToQuestion extends Notification
{
    use Queueable;
    public $answer;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct()
    {
        // 
    }

    // public function __construct(Answer $answer)
    // {
    //     $this->answer = $answer;
    // }

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
        return (new MailMessage)
                    ->line('The question you asked on legalmeet has been answered.')
                    // ->line($this->answer->need_lawyer)
                    ->action('View answer', url('/'))
                    ->line('Thank you for using our application!');
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







