<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function __constructor()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }

    public function Account()
    {
        $user = $this->getInformation();
        return view("user.account", ['user' => $user]);
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $imageName = null;
        if ($request->filled('password') || $request->filled('new_password')) {
            $this->validate($request, [
                'password' => 'password',
                'new_password' => 'required|min:6|max:26|same:new_password_confirmation',
            ]);

        }
        $this->validate($request, [
            'username' => 'max:255|required',
            'image' => 'image',
            'sex' => 'integer',
        ]);
    }

    public function getInformation()
    {
        return UserModel::find(Auth::id());
    }
}
