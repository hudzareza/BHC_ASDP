<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminauthController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        // $this->middleware('guest')->except([
        //     'logout', 'dashboard'
        // ]);
    }

    /**
     * Display a registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        return view('auth.register');
    }

    /**
     * Store a new user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250',
            'password' => 'required|min:8'
        ]);
        // print_r($_POST);die();
        // $role = 'admin';
        $Usercontent = new User;
        $Usercontent->name = $request->name;
        $Usercontent->email = $request->email;
        $Usercontent->phone_number = '';
        // $Usercontent->created_by = '';
        // $Usercontent->updated_by = '';
        $Usercontent->password = Hash::make($request->password);
        $Usercontent->role = 'admin';
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'role' => 'admin'
        // ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        if ($Usercontent->save()) {
            return redirect()->back()->with('message', 'You have successfully registered and next, please log in');
        } else {
            return back()->withSuccess('Failed registered');
        }
        // return redirect()->route('home')
        // ->withSuccess('You have successfully registered & logged in!');
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // print_r($_POST);die();
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->back()->with('message', 'You have successfully logged in!');
            return redirect()->route('admin.dashboard')->withSuccess('You have successfully logged in!');
        }

        return redirect()->back()->withErrors([
            'email' => 'Your email or password do not match in our records.',
        ])->onlyInput('email');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->back()->with('message', 'You have logged out successfully!');
    }
}
