<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ServerCredentialsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $server;
    public $password;

    /**
     * Create a new notification instance.
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
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
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
                    ->subject('Midit - Credenciais de Acesso  🎉')
                    ->view('mail.server_credentials', [
                        'server' => $this->server,
                        'password' => $this->password
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
