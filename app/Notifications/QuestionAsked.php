<?php

namespace App\Notifications;

use App\Question;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class QuestionAsked extends Notification implements ShouldQueue

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
        $url = url('legal-answers/' .$this->question->id. '/' . $this->question->question);

        return (new MailMessage)
                    ->line('A question in your area of practice has been asked on our application.')
                    ->line('Please click the button below to view the question.')
                    ->action('View Question', $url)
                    ->line('Answering client questions increases your chances of obtaining potential clients.');
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
