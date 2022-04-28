<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewQuestionnaire extends Notification
{
    use Queueable;
    private $newQuestionnaire;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newQuestionnaire)
    {
        $this->newQuestionnaire = $newQuestionnaire;
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
        return (new MailMessage)
                    ->subject('Nouveau questionnaire disponible !')
                    ->greeting('Salut' , $this->newQuestionnaire['prenom'])
                    ->line('Un nouveau quiz vient d\'être publié. Consulte le !')
                    ->line($this->newQuestionnaire['body'])
                    ->action($this->newQuestionnaire['actionText'], $this->newQuestionnaire['Url']);
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
