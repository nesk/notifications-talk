<?php

namespace App\Console\Commands;

use App\Notifications\EmailExample;
use App\User;
use Illuminate\Console\Command;

class NotifyEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $url = 'https://slides.com/nesk/notifier-au-mieux-ses-utilisateurs/';
        $notification = new EmailExample($url);

        $user = new User;
        $user->notify($notification);
    }
}
