<?php

namespace App\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InviteMail extends Notification implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('ขอเรียนเชิญเข้าร่วมงานสัมมนาออนไลน์ (The Exclusive Webinar) ผ่านระบบ zoom  วันพุธที่ 17 พฤศจิกายน 2564 เวลา 13:00 - 16:30 น. ในหัวข้อ “Recharge & Comeback Stronger”')
                                ->view('admin.emails.invite',
                                    ['list' => $notifiable->list]);
    }


    public function via ($notifiable) {
        return ['mail'];
    }
}
