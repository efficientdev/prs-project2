<?php
//PendingAction.php 
namespace Modules\PRSs\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Storage;

class CieReUpload extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected array $files;
    public function __construct(array $files,public $extraText="")
    {
        $this->files = $files;
    }


    /**
     * Get the notification's delivery channels.
     */
    public function via($notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    
    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('Rejected Uploads Attached')
            ->line('Please find the attached files.');
        
        if($this->extraText!=''){
            $mail->line($this->extraText);
        }

        foreach ($this->files as $path => $reason) {
            $mail->line(
                "📎  " . asset(Storage::url($path))." : {$reason}"
            );
        }
  
        return $mail;
    }

    public function toMail2($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', 'https://laravel.com')
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     */
    public function toArray($notifiable): array
    {
        return [];
    }
}
