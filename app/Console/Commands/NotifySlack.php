<?php

namespace App\Console\Commands;

use App\Notifications\SlackExample;
use App\User;
use Illuminate\Console\Command;

class NotifySlack extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:slack';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Slack message';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = random_int(600, 999);
        $newUsers = random_int(60, 99);
        $notification = new SlackExample($users, $newUsers);

        $user = new User;
        $user->notify($notification);
    }
}
