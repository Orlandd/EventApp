<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Profiler\Profile;

class UserController extends Controller
{
    public function login()
    {
        return view('login.signin');
    }

    public function register()
    {
        return view('login.registration');
    }


    public function authenticating(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        // cek apakan login valid


        if (Auth::attempt($credentials)) {
            // cek user active 

            $request->session()->regenerate();

            if (Auth::user()->role == 1) {
                return redirect()->intended('/dashboard');
            }

            return redirect()->intended('/');
        }

        Session::flash('status', 'Failed!');
        Session::flash('message', 'Login failed!');

        return back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function registerProcess(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'nohp' => 'required|numeric|min:8',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        // The blog post is valid...
        return redirect('/signin')->with('success', 'Sign Up successfully!');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.users.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'nohp' => 'required|numeric|min:8',
            'password' => 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['role'] = '1';


        // dd($validated);

        User::create($validated);

        // The blog post is valid...
        return redirect('/dashboard/user')->with('success', 'Add user successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('dashboard.users.editProfile');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // dd($id);

        $user = User::find($id);
        $user->delete();

        return redirect('/dashboard/user')->with('success', 'User has been deleted!');
    }

    public function userEdit(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'nohp' => 'required|numeric|min:8',
            'newpassword' => 'nullable|min:5|max:255'
        ]);
        // dd();

        if (!Auth::attempt(['email' => auth()->user()->email, 'password' => $request->password])) {
            return redirect('/profile/edit')->with('success', 'Password not valid!');
        }


        if ($request->email !== auth()->user()->email) {
            $validated = $request->validate([
                'email' => 'required|email|unique:users',
            ]);
            $user->email = $validated['email'];
        }

        if (isset($request->newpassword)) {
            $user->password = Hash::make($validated['newpassword']);
        }

        $user->name = $validated['name'];
        $user->nohp = $validated['nohp'];
        $user->save();

        if (Auth::user()->role == 1) {
            return redirect()->intended('/dashboard');
        }

        return redirect('/profile')->with('success', 'Edit has been successfully');

        // dd($user);
    }
}
