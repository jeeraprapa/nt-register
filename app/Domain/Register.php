<?php namespace App\Domain;

use Illuminate\Database\Eloquent\SoftDeletes;

class Register extends BaseModel
{
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
		'size'
	];

}
