<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateScan extends
	FormRequest
{
	public function rules()
	{
		return [
			'register_id' => 'required'
		];
	}

	public function messages()
	{
		return [
			'register_id.required' => 'กรุณาระบุรหัสลงทะเบียน',
		];
	}

	public function authorize()
	{
		return true;
	}
}
