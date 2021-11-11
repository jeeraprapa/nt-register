<?php namespace App\Domain;

use Illuminate\Database\Eloquent\SoftDeletes;

class Scan extends BaseModel
{
	use SoftDeletes;

	protected $table = 'scan';

	protected $fillable = [
		'register_id',
		'question_id'
	];

	public function register()
	{
		return $this->belongsTo(Register::class, 'register_id');
	}

	public function question()
	{
		return $this->belongsTo(Questions::class, 'question_id');
	}
}
