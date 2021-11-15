<?php namespace App\Domain;

use Illuminate\Database\Eloquent\SoftDeletes;

class Questions extends BaseModel
{
	use SoftDeletes;

	protected $table = 'questions';

	protected $fillable = [
		'slug',
		'state'
	];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:i:s'
    ];

	protected $appends = ['qr'];

    public function getQrAttribute ()
    {
        $url = route('question',[
            'slug' => $this->getAttribute('slug')
        ]);

        return $url;
	}
}
