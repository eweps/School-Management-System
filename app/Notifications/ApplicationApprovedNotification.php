<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationApprovedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Application $application)
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                ->subject('Application Approved')
                ->greeting('Hello ' . $notifiable->name . ',')
                ->line("We're pleased to inform you that an application has been approved.")
                ->action('View Application', route('admin.applications.show', $this->application->id))
                ->line('Thank you for using.' . config('app.name'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'application_id' => $this->application->id,
            'applicant_name' => $this->application->name,
            'message' => "Hello #{$notifiable->name} Application #{$this->application->id} by {$this->application->name} has been approved.",
            'url' => route('admin.applications.show', $this->application->id)
        ];
    }
}
