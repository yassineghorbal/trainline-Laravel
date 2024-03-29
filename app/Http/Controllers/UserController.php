<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //user home page
    public function index()
    {
        return view('users.index');
    }

    //show register form
    public function showRegisterForm()
    {
        return view('users.register');
    }

    //register a new user
    public function register(Request $request)
    {
        //validate the request data
        $formFields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        //hash the password
        $formFields['password'] = bcrypt($formFields['password']);

        //create new user
        $user = User::create($formFields);

        //login
        auth()->login($user);

        //redirect to the home page
        return redirect('/')->with('message', 'You are now logged in!');
    }

    //show login form
    public function login()
    {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

    //logout
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        @request()->session()->regenerateToken();

        return redirect('/')->with('message', 'You are now logged out!');
    }

    //show user tickets
    public function showTickets()
    {
        $tickets = DB::table('tickets')
            ->join('trips', 'tickets.trip_id', '=', 'trips.id')
            ->join('users', 'tickets.user_id', '=', 'users.id')
            ->select('tickets.*', 'trips.start_city', 'trips.end_city', 'trips.start_date', 'trips.end_date', 'trips.price', 'users.name')
            ->where('users.id', '=', Auth::user()->id)
            ->get();

        return view('users.tickets', [
            'tickets' => $tickets,
        ]);
    }
}
