<?php

namespace App\Http\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfirmMail extends Notification implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
	    $file = public_path("uploaded/attach/schedule.pdf");
        return (new MailMessage)->subject('Confirmation Email From NT')
                                ->attach($file)
                                ->view('confirm-mail', ['data' => $notifiable]);
    }


    public function via ($notifiable) {
        return ['mail'];
    }
}
