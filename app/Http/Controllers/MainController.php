<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Answer;
class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }
    public function quiz_detail($slug)
    {
        $quizDetails = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404, 'Quiz Not Found');
        return view('quiz_details', compact('quizDetails'));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz',compact('quiz'));
    }
    public function result(Request $request,$slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404,'Quiz Not Found');
        foreach($quiz->questions as $question){
            Answer::create([
                'user_id'=>auth()->user()->id,
                'question_id'=>$question->id,
                'answer'=>$request->post($question->id)
            ]);
        }
    }
}
