<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use GuzzleHttp\Client;

class BatchChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toBatch($notifiable);
        $message['recipients'] = [
            'tokens' => [$notifiable->batch_push_token],
        ];

        $client = new Client;
        $client->post("https://api.batch.com/1.1/{$notifiable->batch_api_key}/transactional/send", [
            'headers' => [
                'X-Authorization' => $notifiable->batch_rest_api_key
            ],
            'json' => $message,
        ]);
    }
}
