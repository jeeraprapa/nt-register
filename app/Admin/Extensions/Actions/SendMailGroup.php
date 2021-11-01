<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;

class SendMailGroup extends RowAction
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $url = route('admin.mail.group.send',['group'=>$this->id]);
        return "<a href='$url'>Send Mails</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
