<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\ServerCredentialsNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $server;
    protected $password;

    /**
     * Create a new job instance.
     *
     * @param  User  $server
     * @param  string  $password
     * @return void
     */
    public function __construct(User $server, string $password)
    {
        $this->server = $server;
        $this->password = $password;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle()
    {
        $this->server->notify(new ServerCredentialsNotification($this->server, $this->password));
    }
}
