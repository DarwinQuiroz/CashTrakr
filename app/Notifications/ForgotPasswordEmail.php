<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ForgotPasswordEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(protected string $token)
    {
        //
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
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url("/auth/reset-password/{$this->token}?email={$notifiable->email}");

        return (new MailMessage)
            ->subject('Restablecer Contraseña')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Has solicitado restablecer tu contraseña. Haz clic en el botón a continuación para continuar:')
            ->action('Restablecer Contraseña', $url)
            ->line('Si no solicitaste este cambio, puedes ignorar este correo.')
            ->salutation('Saludos, CashTrakr');
    }
}
