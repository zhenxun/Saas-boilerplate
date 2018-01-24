<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ChangePasswordStoreRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PasswordUpdated;

class ChangePasswordController extends Controller
{
    public function index(){
        return view('account.password.index');
    }

    public function update(ChangePasswordStoreRequest $request){

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);

        Mail::to($request->user())->send(new PasswordUpdated());

        return redirect()->route('account.index')->withSuccess('Password updated');

    }
}
