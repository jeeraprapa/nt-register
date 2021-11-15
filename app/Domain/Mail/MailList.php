<?php

namespace App\Domain\Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class MailList extends Model
{
    use Notifiable;
    use SoftDeletes;

    protected $table = 'mail_list';

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];

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
