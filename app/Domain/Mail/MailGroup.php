<?php

namespace App\Domain\Mail;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MailGroup extends Model
{
    use SoftDeletes;

    protected $table = 'mail_group';

    protected $fillable = [
        'name','state'
    ];

    public function lists()
    {
        return $this->hasMany(MailList::class,'mail_group_id');
    }
}
