<?php

namespace App\Console\Commands;

use App\Notifications\BatchExample;
use App\User;
use Illuminate\Console\Command;

class NotifyBatch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:batch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a push notification';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $notification = new BatchExample('Jane');

        $user = new User;
        $user->notify($notification);
    }
}
