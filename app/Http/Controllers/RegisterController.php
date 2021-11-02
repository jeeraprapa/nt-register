<?php

namespace App\Http\Controllers;

use App\Domain\Register;
use Illuminate\Routing\Controller as BaseController;
use Carbon\Carbon;
use Flx\Support\Api\JsonResponse;
use Illuminate\Support\Facades\Http;

class RegisterController extends BaseController
{

    public function register()
    {
        return view('register');
    }

    public function store()
    {
    	$register = new Register();
	    $register->fill(request()->all());
	    $register->save();

	    //$this->sendAccountActivation($register);

	    return redirect()->route('register')->with(['Thankyou' => 1]);

    }
}
