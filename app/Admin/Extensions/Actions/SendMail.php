<?php

namespace App\Admin\Extensions\Actions;

use Encore\Admin\Actions\RowAction;

class SendMail extends RowAction
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $url = route('admin.mail.lists.send',['list'=>$this->id]);
        return "<a href='$url'>Send Mail</a>";
    }

    public function __toString()
    {
        return $this->render();
    }
}
