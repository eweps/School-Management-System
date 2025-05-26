<?php

namespace App\Notifications;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ApplicationRejectedNotification extends Notification
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
                        ->subject('Application Rejected')
                        ->greeting('Hello ' . $notifiable->name . ',')
                        ->line('An application has been rejected.')
                        ->line('Applicant: ' . $this->application->name)
                        ->line('Email: ' . $this->application->email)
                        ->line('You can view more details in the admin dashboard.')
                        ->action('View Application', route('admin.applications.show', $this->application->id))
                        ->line('Thank you.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        $uppercaseName = strtoupper($this->application->name);

        return [
            'application_id' => $this->application->id,
            'applicant_name' => $this->application->name,
            'applicant_email' => $this->application->email,
            'message' => "Hello #{$notifiable->name} Application #{$this->application->id} by #{$uppercaseName} has been rejected.",
            'link' => route('admin.applications.show', $this->application->id),
        ];
    }
}
