<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUsersListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(JobCreated $event): void
    {
        $job = $event->job;

        // Get the users who have the required skills for the job
        $users = User::whereHas('skills', function ($query) use ($job) {
            $query->whereIn('skills.id', $job->skills->pluck('id'));
        })
        ->whereHas('roles', function ($query) {
            $query->where('name', 'alumni');
        })
        ->get();

        // Notify each user
        foreach ($users as $user) {
            $user->notify(new JobPostedNotification($job, $user));
        }
    }
}
