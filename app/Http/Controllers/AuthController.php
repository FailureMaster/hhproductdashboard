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


    public function edit(User $user){
        return view('user.edit', compact('user'));
    }

    public function update(User $user, Request $request){

        $validated = $request->validate([
            'first_name'    => ['required', 'alpha'],
            'last_name'     => ['required', 'alpha'],
            'email'         => ['required', 'email'],
        ]);

        $user->update([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
        ]);
        return back()->with('message', "Successfully udpated $user->first_name");
    }

    public function updatePassword(User $user, Request $request){
        $request->merge([
            'new_password' => trim($request->new_password),
            'password_confirmation' => trim($request->password_confirmation),
        ]);
        // dd($request->all());
        // if ($request->new_password == $request->password_confirmation) {
        // }
        $validated = $request->validate([
            'old_password'                  => ['required'],
            'new_password'                  => ['required'],
            'password_confirmation'         => ['required', 'confirmed:new_password']
        ]);


        $is_password_valid = password_verify($validated['old_password'], $user->password);

        if ($is_password_valid) {
            $user->update(['password' => $validated['new_password']]);
            return back()->with('message', "Successfully udpated password");
        }else{
            return back()->with('message', "password mismatch");
        }


    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
