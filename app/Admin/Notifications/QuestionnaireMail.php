<?php

namespace App\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QuestionnaireMail extends Notification implements ShouldQueue
{
    use Queueable;

    public function toMail($notifiable)
    {
        return (new MailMessage)->subject('ขอเชิญผู้เข้าร่วมสัมมนาออนไลน์ ร่วมกรอกแบบประเมินความพึงพอใจ ต่อการจัดงาน The Exclusive Webinar ของบริษัท โทรคมนาคมแห่งชาติ จำกัด (มหาชน)')
                                ->view('admin.emails.questionnaire',
                                    ['list' => $notifiable->list]);
    }

    public function via ($notifiable) {
        return ['mail'];
    }
}
