<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function dashboard(){
        $quizzes = Quiz::where('status','publish')->withCount('questions')->paginate(5);
        return view('dashboard',compact('quizzes'));
    }
    public function quiz_detail($slug)
    {
    $quizDetails = Quiz::whereSlug($slug)->withCount('questions')->first() ?? abort(404,'Quiz Not Found');
    return view('quiz_details',compact('quizDetails'));
    }
}
