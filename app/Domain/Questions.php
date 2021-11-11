<?php namespace App\Domain;

use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends BaseModel
{
	use SoftDeletes;

	protected $table = 'questions';

	protected $fillable = [
		'slug',
		'qr_code',
		'state'
	];
}