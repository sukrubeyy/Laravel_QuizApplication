<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Http\Requests\QuizCreteRequest;
use App\Http\Requests\QuizUpdateRequest;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //paginate yerine get dersek tüm hepsini çeker
        //paginate yazarsak verdiğimiz parametre kadar veri çeker
        $quizzes = Quiz::paginate(5);
        return view('Admin.Quiz.list',compact('quizzes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.quiz.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuizCreteRequest $request)
    {
        Quiz::create($request->post());
        return redirect()->route('quizzes.index')->withSuccess('Quiz Created Successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Quiz modelinde $id numaralı veriyi çeker ?? eğer yoksa demektir.
        // abort 404 page sayfasını döndür burda Quizz Not Found yazdırmak istiyoruz
        // bu yüzden errors view içerisinde 404 blade içerisinde giriyoruz.
        $quiz = Quiz::find($id) ?? abort(404,'Quiz Not Found');

        return view('admin.quiz.edit',compact('quiz'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuizUpdateRequest $request, $id)
    {
        $quiz=Quiz::find($id) ?? abort(404,'Quiz Not Found');
        Quiz::where('id',$id)->update($request->except(['_method','_token','isWannaAddTime']));
        return redirect()->route('quizzes.index')->withSuccess('Quiz Updated Successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::find($id) ?? abort(404,'Quiz Not Found');
        $quiz->delete();
        return redirect()->route('quizzes.index')->withSuccess('Quiz Deleted Succesfully');
    }
}
