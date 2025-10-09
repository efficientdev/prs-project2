<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ApplicationApproved extends Notification
{
    //use Queueable;
    
    protected string $userName;

    /**
     * Create a new notification instance.
     */
    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }
    /**
     * Create a new notification instance.
     */
    public function __construct3()
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
    public function toMail3(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Your Application is Approved ')
                    ->greeting("Hello {$this->userName},")
                    ->line('We’re pleased to inform you that your application has been fully approved.')
                    ->line('You can now access all features and continue with your journey.')
                    ->action('Go to Dashboard', url('/dashboard'))
                    ->line('Thank you for choosing our platform!');
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
