<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class EmailExample extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    protected $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $url)
    {
        $this->url = $url;
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
            ->subject('Notifications Laravel')
            ->greeting('Bonjour John!')
            ->line(
                'J\'ai cru comprendre que vous vouliez en '
                .'savoir plus sur les notifications Laravel ?'
            )
            ->line('Voici un talk qui devrait vous intéresser :')
            ->action('Consulter le talk', $this->url)
            ->line('À bientôt !');
    }
}
