<?php

namespace App\Notifications;

use App\Mail\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactFormNotification extends Notification
{
    use Queueable;

    public $contact;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $contact )
    {
        $this->user = $user;
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new Contact($notifiable, $this->contact))
                ->to($notifiable->email);
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
            'nom'=> $notifiable->nom,
            'prenom'=>$notifiable->prenom,
            'email'=>$notifiable->email,
            'message'=>$notifiable->message
        ];
    }
}
