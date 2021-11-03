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
        $logo = public_path("images/logo3.png");

        return (new MailMessage)->subject('แจ้งเตือนกำหนดการเข้าร่วมงานสัมนา 17 พฤศจิกายน 2564')
                                ->greeting('เรียน ผู้สนใจเข้าร่วมงานสัมนา')
                                ->line('เอกสารกำหนดการตามไฟล์แนบ')
                                ->attach($file);
    }

    public function via ($notifiable) {
        return ['mail'];
    }
}
