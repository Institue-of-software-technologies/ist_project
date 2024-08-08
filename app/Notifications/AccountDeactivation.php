<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AccountDeactivation extends Notification
{
    private $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Account Deactivated')
            ->line('Your account has been deactivated due to inactivity.')
            ->line('If you believe this is a mistake or wish to reactivate your account, please contact support. @ kabogp@gmail.com');
    }
}
