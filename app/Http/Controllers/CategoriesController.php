<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function all()
    {
        $questions = DB::table('questions')
            ->join('users', 'questions.user_id', '=', 'users.id')
            ->get()->all();
        return view('dashboard.main', ['questions' => $questions]);
    }

    public function question($id)
    {
        $question = DB::table('questions')->find($id);
        $userPublisher = DB::table('users')->find($question->user_id,['name','id','permission','image_path_user']);
        $questionComments = DB::table('answers')->join('users', 'answers.user_id', '=', 'users.id')->where
        ('question_id', '=', $id)
            ->get(['answers.content', 'users.name', 'users.id']);
//        dd($question,$userPublisher,$questionComments);
        return view('dashboard.question', [
            'question' => $question,
            'userPublisher' => $userPublisher,
            'comments' => $questionComments
        ]);
    }
}
