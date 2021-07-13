<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Questions extends Controller
{
    //
    public function __constructor()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function add_comments($id, Request $request)
    {
//        dd($id,$request->all());
        $request->validate(
            ['answer' => 'required']
        );
        DB::table('answers')->insert(['content' => $request->input('answer'), 'user_id' => Auth::id(), 'question_id' => $id]);
        return redirect('/question/' . $id);
    }

    public function newQuestion()
    {
        return view('dashboard.add');
    }

    public function add(Request $request)
    {
        $id = Auth::id();
//        return route('all_questions');
    }
}
