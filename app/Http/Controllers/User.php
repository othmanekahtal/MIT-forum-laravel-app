<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

//use Illuminate\Support\Facades\Storage;

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
//        dd($request->all());
        $data = [];
        if ($request->filled('password') || $request->filled('new_password')) {
            $this->validate($request, [
                'password' => 'password',
                'new_password' => 'required|min:6|max:26|same:new_password_confirmation',
            ]);
            $data['password'] = Hash::make($request->new_password);
        }
        if ($request->file('avatar')) {
            $request->validate(['avatar' => 'image|mimes:jpg,png,jpeg,gif,svg']);
            $image_name = time() . '-' . $request->username . '.' . $request->avatar->extension();
            $data['image_path'] = $image_name;
            if (!($this->getInformation()->image_path === 'user.png')) {
                if (File::exists(public_path('images/' . $this->getInformation()->image_path))) {
                    File::delete(public_path('images/' . $this->getInformation()->image_path));
//                Storage::delete();
                }
                $request->avatar->move(public_path('images'), $image_name);
            }
        }
        $this->validate($request, [
            'username' => 'max:255|required',
            'sex' => 'integer',
        ]);
        $data['sex'] = $request->sex;
        $data['name'] = $request->username;
        UserModel::where('id', $this->getInformation()->id)
            ->update($data);
        return redirect(route('account'));

    }

    public function delete()
    {
        $userInformation = $this->getInformation();
        $data = [
            'id' => $userInformation->id,
            'name' => $userInformation->name,
            'permission' => $userInformation->permission,
            'image_path' => $userInformation->image_path,
            'sex' => $userInformation->sex,
            'email' => $userInformation->email,
            'email_verified_at' => $userInformation->email_verified_at,
            'password' => $userInformation->password
        ];
        DB::table('archive_user')->insert($data);
        DB::table('users')->delete($userInformation->id);
    }

    public function getInformation()
    {
        return UserModel::find(Auth::id());
    }

    public function user($id)
    {
        return view('user.user', ['user' => UserModel::find($id)]);
    }

}


