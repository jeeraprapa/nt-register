<?php

namespace App\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ReminderMail extends Notification implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
        $file = public_path("uploaded/attach/online-NT.pdf");

        return (new MailMessage)->subject('The Exclusive Webinar: “Recharge & Comeback Stronger” Reminder')
                                ->view('admin.emails.reminder')
                                ->attach($file);
    }

    public function via ($notifiable) {
        return ['mail'];
    }
}
