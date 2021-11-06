<?php

namespace App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRegister extends
	FormRequest
{
	public function rules()
	{
		return [
			'department' => 'required',
			'title' => 'required',
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email:rfc,dns|max:255|unique:register,email,NULL,id,deleted_at,NULL',
			'telephone' => 'required|numeric|regex:/[0-9]{9,10}/',
			'mobile_phone' => 'required|numeric|digits:10',
			'address' => 'required',
			'size' => 'required'
		];
	}

	public function messages()
	{
		return [
			'department.required' => 'กรุณาระบุหน่วยงาน',
			'title.required' => 'กรุณาระบุคำนำหน้า',
			'first_name.required' => 'กรุณาระบุชื่อ',
			'last_name.required' => 'กรุณาระบุนามสกุล',
			'email.required' => 'กรุณาระบุอีเมล',
			'email.unique' => 'อีเมลนี้มีผู้ใช้แล้ว กรุณาระบุอีเมลใหม่',
			'email.max' => 'กรุณาระบุอีเมล ไม่เกิน 255 ตัวอักษร',
			'email.email' => 'กรุณากรอกอีเมลให้ถูกต้อง',
			'telephone.required' => 'กรุณาระบุเบอร์โทรศัพท์หน่วยงาน',
			'telephone.regex' => 'กรุณาระบุเบอร์โทรศัพท์หน่วยงานให้ถูกต้อง',
			'mobile_phone.required' => 'กรุณาระบุเบอร์โทรศัพท์มือถือ',
			'mobile_phone.digits' => 'กรุณาระบุเบอร์โทรศัพท์มือถือให้ถูกต้อง',
			'mobile_phone.numeric' => 'กรุณาระบุเบอร์โทรศัพท์มือถือด้วยตัวเลข',
			'address.required' => 'กรุณาระบุที่อยู่',
			'size.required' => 'กรุณาระบุไซส์'
		];
	}

	public function authorize()
	{
		return true;
	}
}
