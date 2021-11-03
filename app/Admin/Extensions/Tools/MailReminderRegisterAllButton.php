<?php

namespace App\Admin\Extensions\Tools;

use Encore\Admin\Grid\Tools\AbstractTool;

class MailReminderRegisterAllButton extends AbstractTool
{

    public function render ()
    {
        $url = route('admin.mail.reminder.send');
        return "<a href='$url' class='btn btn-sm btn-twitter'>Reminder Mails</a>";
    }
}
