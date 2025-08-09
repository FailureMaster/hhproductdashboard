<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index(){
        return view('auth.login');
    }


    public function login(Request $request){
        $attribs = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required']
        ]);

        if (!Auth::attempt($attribs)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credetianls do not match'
            ]);
        }

        request()->session()->regenerate();

        return redirect('dashboard/admin');

    }



    public function create(){
        return view('auth.registration');
    }

    public function store(StoreUserRequest $req){
        User::create($req->validated());
        return redirect('dashboard/admin');
    }


    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
