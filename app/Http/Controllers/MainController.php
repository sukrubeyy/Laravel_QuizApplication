<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Result;

class MainController extends Controller
{
    public function dashboard()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }
    public function quiz_detail($slug)
    {
        $quizDetails = Quiz::whereSlug($slug)->with('my_result', 'results')->withCount('questions')->first() ?? abort(404, 'Quiz Not Found');
        return view('quiz_details', compact('quizDetails'));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::whereSlug($slug)->with('questions')->first();
        return view('quiz', compact('quiz'));
    }
    public function result(Request $request, $slug)
    {
        $quiz = Quiz::with('questions')->whereSlug($slug)->first() ?? abort(404, 'Quiz Not Found');

        if ($quiz->my_result) {
            abort(404, 'You Joined This Quiz');
        }

        $correctAnswer = 0;
        $point = 0;
        foreach ($quiz->questions as $question) {
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id)
            ]);
            if ($question->correct_answer === $request->post($question->id)) {
                $correctAnswer++;
            }
        }
        $point = round((100 / count($quiz->questions)) * $correctAnswer);
        $wrong = count($quiz->questions) - $correctAnswer;

        Result::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correctAnswer,
            'wrong' => $wrong,
        ]);

        return redirect()->route('quiz.detail', $quiz->slug)->withSuccess("Quiz Puanınız: " . $point);
    }
}
