<?php

namespace App\Notifications;

use App\Models\Job;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class JobPostedNotification extends Notification
{
    use Queueable;

    public $job;
    public $user;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Job  $job
     */
    public function __construct(Job $job, User $user)
    {
        $this->job = $job;
        $this->user = $user;
    }

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
                    ->line('A new Job matching your skills has posted Please Login to view the job. ' .$this->job->title)
                    ->action('Login', url('login'))
                    ->line('Thank you for using our application!');
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'job_title' => $this->job->title,
            'job_description' => $this->job->description,
            'job_url' => url('jobs/'.$this->job->id.'/show'),
            'notifiable_type' => get_class($this->user),
            'notifiable_id' => $notifiable->id,
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => 'A JOB MATCHING YOUR SKILLS HAS BEEN POSTED: ' . $this->job->title,
            'job_id' => $this->job->id,
            'company_logo' => $this->job->company_logo,
            'route' => route('alumni.job.index')
        ];
    }
}
