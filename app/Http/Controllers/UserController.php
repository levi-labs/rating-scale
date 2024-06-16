<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Users Management';

        $data = User::all();

        return view('pages.user.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create User Page';

        return view('pages.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
            'akses_level' => 'required',
        ]);
        try {

            User::create($request->all());

            return redirect()->route('user.index')->with('success', 'User has been created');
        } catch (\Exception $th) {

            return redirect()->route('user.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $title = 'Edit User Page';

        return view('pages.user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'akses_level' => 'required',
        ]);
        try {
            if ($user->username != $request->username && $user->email != $request->email) {
                $request->validate([
                    'username' => 'required|unique:users',
                    'email' => 'required|email|unique:users',
                ]);
            }
            $user->update($request->all());

            return redirect()->route('user.index')->with('success', 'User has been updated');
        } catch (\Exception $th) {

            return back()->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        try {

            $user->delete();

            return back()->with('success', 'User has been deleted');
        } catch (\Exception $th) {

            return back()->with('error', $th->getMessage());
        }
    }

    public function resetPassword(User $user)
    {
        try {
            $user->password = bcrypt($user->username);
            $user->save();

            return back()->with('success', 'User password has been reset to ' . $user->username);
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function changePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|max:255',
        ]);

        try {
            $user->password = bcrypt($request->password);
            $user->save();

            return back()->with('success', 'User password has been changed');
        } catch (\Exception $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function showFormLogin()
    {
        $title = 'Login Page';

        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($request->only('username', 'password'))) {

            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Login failed!');
    }
}
