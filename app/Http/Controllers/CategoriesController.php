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

//    public function all()
//    {
//        $questions = DB::table('questions')
//            ->join('users', 'questions.user_id', '=', 'users.id')
//            ->select('*','questions.id as id_question')->get();
////        $questions = DB::table('questions')->get();
//        return view('dashboard.main', ['questions' => $questions]);
//    }
//
//    public function question($id)
//    {
//        $question = DB::table('questions')->find($id);
//        $userPublisher = DB::table('users')->find($question->user_id,['name','id','permission','image_path_user']);
//        $questionComments = DB::table('answers')->join('users', 'answers.user_id', '=', 'users.id')->where
//        ('question_id', '=', $id)
//            ->get(['answers.content', 'users.name', 'users.id']);
////        dd($question,$userPublisher,$questionComments);
//        return view('dashboard.question', [
//            'question' => $question,
//            'userPublisher' => $userPublisher,
//            'comments' => $questionComments
//        ]);
//    }
//    public function deleteQuestion($id){
//        $question = DB::table('question')->find($id);
//        DB::table('archive_question')->insert([
//            'id'=>$question->id,
//            'title'=>$question->title,
//            'image_path_question'=>$question->image_path_question,
//            'content'=>$question->content,
//            'user_id'=>$question->user_id,
//            'tag'=>$question->tag,
//            'category'=>$question->category,
//            'created_at'=>$question->created_at
//        ]);
//        return back();
//    }
}
