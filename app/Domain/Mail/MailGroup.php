<?php

namespace App\Domain\Mail;

use Illuminate\Database\Eloquent\Model;

class MailGroup extends Model
{
    protected $table = 'mail_group';

    protected $fillable = [
        'name','state'
    ];

    public function lists()
    {
        return $this->hasMany(MailList::class,'mail_group_id');
    }
}
