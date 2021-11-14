<?php

namespace App\Admin\Extensions\Tools;

use Encore\Admin\Grid\Tools\AbstractTool;

class MailQuestionnaireAllButton extends AbstractTool
{

    public function render ()
    {
        $url = route('admin.mail.questionnaires.send');
        return "<a href='$url' class='btn btn-sm btn-google'>Questionnaire Mails</a>";
    }
}
