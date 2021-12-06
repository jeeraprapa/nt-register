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
//        return (new MailMessage)->subject('บริษัท โทรคมนาคมแห่งชาติ จำกัด (มหาชน) ขอเรียนเชิญเข้าร่วมงานสัมมนาออนไลน์')
//                                ->view('admin.emails.invite',
//                                    ['list' => $notifiable->list]);

        $file1 = public_path("uploaded/attach/doh/AgendaEn.pdf");
        $file2 = public_path("uploaded/attach/doh/AgendaTh.pdf");
        $file3 = public_path("uploaded/attach/doh/ecard_en.jpg");
        $file4 = public_path("uploaded/attach/doh/ecard_th.jpg");

        return (new MailMessage)->subject('กรมอนามัย กระทรวงสาธารณสุข ขอเรียนเชิญเข้าร่วมงานสัมมนาออนไลน์')
                                ->view('admin.emails.doh',
                                    ['list' => $notifiable->list])->attach($file1)->attach($file2)->attach($file3)->attach($file4);
    }


    public function via ($notifiable) {
        return ['mail'];
    }
}
