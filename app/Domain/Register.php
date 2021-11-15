<?php namespace App\Domain;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Register extends BaseModel
{
	use Notifiable;
	use SoftDeletes;

	protected $table = 'register';

	protected $fillable = [
		'title',
		'first_name',
		'last_name',
		'department',
		'age',
		'position',
		'telephone',
		'mobile_phone',
		'email',
		'address',
		'size',
        'reminder'
	];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];

    public function scores ()
    {
        return $this->hasMany(Scan::class);
    }

	public function getFormattedIdAttribute()
	{
		return str_pad($this->id, 3, '0', STR_PAD_LEFT);
	}

	public function getFullNameAttribute()
	{
		return $this->title.' '.$this->first_name.' '.$this->last_name;
	}
}
