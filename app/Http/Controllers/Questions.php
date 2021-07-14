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
        $tag = 1;
        $category = 1;
        $data = [];
        if ($request->file('image_question')) {
            $request->validate(['image_question' => 'image|mimes:jpg,png,jpeg,gif,svg']);
            $image_name = time() . '.' . $request->image_question->extension();
            $data['image_path_question'] = $image_name;
            $request->image_question->move(public_path('images'), $image_name);
        }
        $request->validate(['title' => 'required|max:100', 'content' => 'required|max:255']);
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['user_id'] = $id;
        $data['tag'] = $tag;
        $data['category'] = $category;

//        dd($data);
        DB::table('questions')->insert($data);
        return redirect(route('dashboard'));
    }

    public function QuestionsUser($id)
    {
        $questions = DB::table('questions')->where("user_id", '=', $id)->get();
//        dd($questions);
        return view('dashboard.questions', ['questions' => $questions]);
    }

    public function all()
    {
        $questions = DB::table('questions')
            ->join('users', 'questions.user_id', '=', 'users.id')
            ->select('*','questions.id as id_question')->get();
//        $questions = DB::table('questions')->get();
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
    public function deleteQuestion($id): \Illuminate\Http\RedirectResponse
    {
        $question = DB::table('questions')->find($id);
        DB::table('archive_question')->insert([
            'id'=>$question->id,
            'title'=>$question->title,
            'image_path_question'=>$question->image_path_question,
            'content'=>$question->content,
            'user_id'=>$question->user_id,
            'tag'=>$question->tag,
            'category'=>$question->category,
            'created_at'=>$question->created_at
        ]);
        DB::table('questions')->delete($id);
        return back();
    }
}
