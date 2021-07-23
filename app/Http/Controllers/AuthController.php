<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class AuthController extends Controller
{
    public function getRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);


        event(new Registered($user));

        auth()->login($user);

        return redirect('/');
    }

    public function getLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);
        // [
        //     'email' => $request->get('email'),
        //     'password' => $request->get('password')
        // ];

        if (auth()->attempt($credentials)) {
            // attempt metoda selektuje usera po emailu,
            // provjeri password i setuje usera na sesiju
            return redirect('/');
        }
        // $email = $request->get('email');
        // $password = $request->get('password');
        // $user = User::where('email', $email)->first(); // null, {}

        // if ($user && Hash::check($password, $user->password)) {
        //     auth()->login($user);
        //     return redirect('/');
        // }

        return back()->withErrors(['password' => 'Invalid credentials']);
    }

    public function logout()
    {
        auth()->logout();
        return back();
    }

    public function getEmailVerificationNotice()
    {
        return view('auth.verify-email');
    }

    public function verifyEmail(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/');
    }
}

// auth()->check(), auth()->login(), auth()->user(), auth()->logout()