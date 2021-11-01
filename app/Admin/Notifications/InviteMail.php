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
        return (new MailMessage)->subject('บริษัท โทรคมนาคมแห่งชาติ จำกัด (มหาชน) เชิญชวนผู้ที่สนใจเข้าร่วมงานสัมนา 17 พฤศจิกายน 2564')
                                ->view('admin.emails.invite',
                                    ['list' => $notifiable->list]);
    }


    public function via ($notifiable) {
        return ['mail'];
    }
}
