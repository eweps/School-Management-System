<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccountDetailsNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        public User $user,
        public string $defaultPassword
    ){}

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
        return (new MailMessage)
            ->subject('Your Account Has Been Created')
            ->greeting("Hello {$this->user->name},")
            ->line('Your account has been successfully created. Below are your login details:')
            ->line("**Email:** {$this->user->email}")
            ->line("**Temporary Password:** {$this->defaultPassword}")
            ->line('You can log in using the button below. For security reasons, please change your password after your first login.')
            ->action('Login to Your Account', url('/login'))
            ->line('If you did not request this account, please contact our support team immediately.')
            ->salutation('Have a great day!');
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
