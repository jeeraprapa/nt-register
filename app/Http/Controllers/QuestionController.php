<?php

namespace App\Http\Controllers;

use App\Domain\Questions;
use App\Domain\Register;
use App\Domain\Scan;
use App\Http\Request\UpdateAnswer;
use App\Http\Request\UpdateScan;
use Illuminate\Routing\Controller as BaseController;

class QuestionController extends
	BaseController
{

	public function index ($slug)
	{
		$question = Questions::where('slug', $slug)->where('state', 'PUBLISHED')->first();
		if(empty($question)) {
			abort(404);
		}

		return view('questions', compact('question'));
	}

	public function store (UpdateScan $request, $slug)
	{
		$question = Questions::where('slug', $slug)->where('state', 'PUBLISHED')->first();
		$register = Register::find($request->get('register_id'));

		if(empty($register)) {
			return redirect()
				->back()
				->withInput()
				->with(['MessageFailed' => 'ไม่พบรหัสลงทะเบียนนี้ กรุณาระบุรหัสที่ถูกต้อง']);
		}
		$count = Scan::where('register_id', $register->id)
		             ->where('question_id', $question->id)
		             ->count();
		if ($count > 0) {
			return redirect()
				->back()
				->withInput()
				->with(['Message' => 'คุณได้ส่งรหัสลงทะเบียนข้อนี้แล้ว']);
		}

		$scan = new Scan();
		$scan->question_id = $question->id;
		$scan->register_id = $register->id;
		$scan->save();

		return redirect()
			->back()
			->with(['Message' => 'ขอบคุณสำหรับการส่งรหัสลงทะเบียน เพื่อร่วมสนุก']);
	}

}