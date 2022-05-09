<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Utilisateur;

class NewQuestionnaire extends Notification
{
    use Queueable;
    private $newQuestionnaire;
    private $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($newQuestionnaire, $user)
    {
        $this->newQuestionnaire = $newQuestionnaire;
        $this->user = $user;
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
    public function toMail($notifiable, Utilisateur $user)
    {
        return (new MailMessage)
                    ->subject('Nouveau questionnaire disponible !')
                    ->greeting('Salut' , $this->$user['prenom'])
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
