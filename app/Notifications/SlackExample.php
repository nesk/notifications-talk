<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;

class SlackExample extends Notification
{
    use Queueable;

    /**
     * @var int
     */
    protected $users;

    /**
     * @var int
     */
    protected $newUsers;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(int $users, int $newUsers)
    {
        $this->users = $users;
        $this->newUsers = $newUsers;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        return (new SlackMessage)
            ->success()
            ->content('Voici les dernières statistiques :')
            ->attachment(function ($attachment) {
                $date = date('d/m/Y');
                $url = 'https://analytics.google.com/analytics/web';

                $attachment->title("Stats du $date", $url)
                    ->fields([
                        'Utilisateurs' => $this->users,
                        'Nouveaux utilisateurs' => $this->newUsers,
                    ]);
            });
    }
}
