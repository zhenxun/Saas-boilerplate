<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ActivateResendRequest;
use App\Models\User;
use App\Events\Auth\UserRequestActivationEmail;

class ActivationResendController extends Controller
{
    public function index(){
        return view('auth.activation.resend');
    }

    public function store(ActivateResendRequest $request){
        
        $user = User::where('email', $request->email)->first();

        if (optional($user)->hasNotActivated()){
            event(new UserRequestActivationEmail($user));
        }
        
        return redirect()->route('login')->withSuccess('An activation email has been sent');
    }
}
