<x-app-layout>
    <x-slot name="header">
        {{$quiz->title."'s Question"}}
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.index',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i>Go Back</a>
            </h5>
            <h5 class="card-title">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Create Question</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Question</th>
                        <th scope="col">Image</th>
                        <th scope="col">Answer 1</th>
                        <th scope="col">Answer 2</th>
                        <th scope="col">Answer 3</th>
                        <th scope="col">Answer 4</th>
                        <th scope="col">Correct Answer</th>
                        <th scope="col">Transactions</th>
                    </tr>
                    @foreach($quiz->questions as $question)
                    <tr>
                        <td>{{$question->question}}</td>
                        <td>{{$question->image}}</td>
                        <td>{{$question->answer1}}</td>
                        <td>{{$question->answer2}}</td>
                        <td>{{$question->answer3}}</td>
                        <td>{{$question->answer4}}</td>
                        <td>{{$question->correct_answer}}</td>
                        <td>
                            <a href="{{route('questions.edit',[$quiz->id,$question->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('questions.destroy',[$quiz->id,$question->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
