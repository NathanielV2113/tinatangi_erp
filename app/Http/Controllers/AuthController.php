<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{

    public function register()
    {
        if (session('success_message')) {Alert::success('Success', session('success_message'));}
        return view('auth.register');
    }

    public function login()
    {
        if (session('success_message')) {Alert::success(session('success_message'));}
        return view('auth.login');
    }
    public function forgotPassword(){
        if (session('success_message')) {Alert::success('Success', session('success_message'));}
        return view('auth.forgot_password');
    }
    public function home(){
        if (session('success_message')) {Alert::success( session('success_message'));}
        return view('admin.dashboard');
    }

    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users|regex:/[a-zA-Z]/|regex:/[0-9]/|regex:/[@_.]/',
            'password' => 'required|confirmed|min:8|max:20|string',
        ])->validate();

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' =>  Hash::make($request->password)
        ]);
        return redirect()->route('login')->withSuccessMessage('Registered Successfully');
    }

    public function loginAction(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            Alert::error('Wrong Credentials');
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $request->session()->regenerate();

        $authUserRole = Auth::user()->role;
        $authUserStatus = Auth::user()->status;


        switch ($authUserRole) {
            case 1:
                if($authUserStatus == 6) {
                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    Alert::error('Your Account is Deactivated!');
                    return redirect('/');
                }
                return redirect()->intended(route('admin', absolute: false))->withSuccessMessage('Logged in successfully!');
            case 2:
                if($authUserStatus == 6) {
                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    Alert::error('Your Account is Deactivated!');
                    return redirect('/');
                }
                return redirect()->intended(route('hr', absolute: false))->withSuccessMessage('Logged in successfully!');
            case 3:
                if($authUserStatus == 6) {
                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    Alert::error('Your Account is Deactivated!');

                    return redirect('/');
                }
                return redirect()->intended(route('home', absolute: false))->withSuccessMessage('Logged in successfully!');
            case 22:
                if($authUserStatus == 22) {
                    Auth::guard('web')->logout();

                    $request->session()->invalidate();

                    $request->session()->regenerateToken();
                    Alert::error('Account not confirmed!');

                    return redirect('/');
                }
            default:
                Auth::guard('web')->logout();

                $request->session()->invalidate();
        
                $request->session()->regenerateToken();
                Alert::error('Access Denied!');
                return redirect('/login');
        }

        // return redirect()->route('dashboard')->with('success');
    }

    public function accountRecovery(Request $request){
        $accountIsFound = null;
        $users = DB::table('users')->get();
        $data = $request->validate([
            'email' => 'required|email'
        ]);
        $email = [];
        foreach ($users as $user){
            if (!$data['email'] == $user->email) {
                $accountIsFound = false;
            }
            else if ($data['email'] == $user->email) {
                $email = $user->email;
                $accountIsFound = true;
            }
        }

        if($accountIsFound){
            return view('auth.account_recovery', compact('email'));
        }

        Alert::error('Account not found!');
        throw ValidationException::withMessages([
            'email' => trans('auth.failed')
        ]);
    }

    public function resetPassword(String $email, Request $request) {
        $data = $request->validate([
            // 'email' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password'
        ]);

        $user = User::where('email', $email)->first();
        $user->password = Hash::make($data['confirm_password']);
        $user->save();

        return redirect()->route('login')->withSuccessMessage('Account Recovered Successfully');
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
