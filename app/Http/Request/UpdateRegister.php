<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegister extends
	FormRequest
{
	public function rules()
	{
		return [
			'title' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|max:255|unique:register,email,NULL,id,deleted_at,NULL',
			'mobile_phone' => 'required|digits:10',
			'address' => 'required'
		];
	}

	public function messages()
	{
		return [
			'title.required' => 'กรุณาระบุคำนำหน้า',
			'first_name.required' => 'กรุณาระบุชื่อ',
			'last_name.required' => 'กรุณาระบุนามสกุล',
			'email.required' => 'กรุณาระบุอีเมล',
			'email.unique' => 'อีเมลนี้มีผู้ใช้แล้ว กรุณาระบุอีเมลใหม่',
			'email.max' => 'กรุณาระบุอีเมล ไม่เกิน 255 ตัวอักษร',
			'mobile_phone.required' => 'กรุณาระบุเบอร์โทรศัพท์มือถือ',
			'mobile_phone.digits' => 'กรุณาระบุเบอร์โทรศัพท์มือถือให้ถูกต้อง',
			'address.required' => 'กรุณาระบุที่อยู่'
		];
	}

	public function authorize()
	{
		return true;
	}
}
