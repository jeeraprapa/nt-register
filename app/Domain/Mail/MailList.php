<?php

namespace App\Domain\Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class MailList extends Model
{
    use Notifiable;

    protected $table = 'mail_list';

    protected $fillable = [
        'mail_group_id',
        'first_name',
        'last_name',
        'email',
        'account',
        'department',
        'state'
    ];

    public function group()
    {
        return $this->belongsTo(MailGroup::class,'mail_group_id');
    }

}
