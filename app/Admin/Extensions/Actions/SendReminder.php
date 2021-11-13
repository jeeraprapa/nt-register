<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;

class SendReminder extends RowAction
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $url = route('admin.mail.reminder',['register'=>$this->id]);
        return "<a href='$url'>Send Mail</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
