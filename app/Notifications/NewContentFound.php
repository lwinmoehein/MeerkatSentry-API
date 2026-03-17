<?php

namespace App\Notifications;

use App\Models\WatchJob;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContentFound extends Notification
{
    public function toArray()
    {
        return [
            'title'=>$this->title,
            'job_name'=>$this->watchJob->name,
            'job_url'=>$this->watchJob->url,
            'job_last_tag_count'=>$this->watchJob->last_tag_count
        ];
    }

    use Queueable;

    protected $title = "Changes found on the web page you are watching.";

    /**
     * Create a new notification instance.
     */
    protected $watchJob;
    public function __construct(WatchJob $watchJob)
    {
        //
        $this->watchJob = $watchJob;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->title)
            ->view('mails.tags.new', [
                'title'       => $this->title,
                'description' => "May be it is a new job posted!",
                'count'       => 1,
                'url'         => $this->watchJob->url,
                'appName'     => config('app.name'),
                'iconUrl'     => asset('meerkat.png')
            ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */

}
