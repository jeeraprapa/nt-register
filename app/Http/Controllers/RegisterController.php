<?php

namespace App\Http\Controllers;

use App\Domain\Register;
use App\Http\Notifications\ConfirmMail;
use App\Http\Request\UpdateRegister;
use Illuminate\Routing\Controller as BaseController;

class RegisterController extends BaseController
{

    public function register()
    {
        return view('register');
    }

    public function store(UpdateRegister $request)
    {
    	$register = new Register();
	    $register->fill($request->all());
	    $register->save();

	    $this->sendMailConfirm($register);

	    return redirect()->route('register')->with(['Thankyou' => 1]);
    }

	private function sendMailConfirm($register)
	{
		if(!$register->email){
			return;
		}
		try {
			$register->notify(new ConfirmMail());

		}catch (\Exception $e){
			\Log::error($register,$e);
		}
	}
}
