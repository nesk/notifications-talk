<?php

namespace App\Notifications;

use App\Channels\BatchChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BatchExample extends Notification
{
    use Queueable;

    /**
     * @var string
     */
    protected $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [BatchChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toBatch($notifiable)
    {
        return [
            'group_id' => 'batch_example',
            'message' => [
                'title' => 'Nouveau message',
                'body' => "Vous avez reçu un nouveau message de la part de {$this->name}.",
            ],
        ];
    }
}
