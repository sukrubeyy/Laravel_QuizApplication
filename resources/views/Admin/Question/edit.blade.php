<x-app-layout>
    <x-slot name="header">{{$question->question}} EDIT</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('questions.update',[$question->quiz_id,$question->id])}}" method="POST" enctype="multipart/form-data" >
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{$question->question}}" class="form-control"">
                </div>
               <div class=" row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 1</label>
                            <textarea name="answer2" class="form-control" rows="4">{{$question->answer1}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 2</label>
                            <textarea name="answer1" class="form-control" rows="4">{{$question->answer2}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Answer 3</label>
                            <textarea name="answer4" class="form-control" rows="4">{{$question->answer3}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description">Answer 4</label>
                            <textarea name="answer3" class="form-control" rows="4">{{$question->answer4}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <a href="{{asset($question->image)}}" target="_blank">
                        <img src="{{asset($question->image)}}" class="img-responsive" style="width:500px;">
                    </a>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <label>Correct Answer</label><br>
                    <select name="correct_answer">
                        <option value="answer1" @if($question->correct_answer === 'answer1') selected @endif >Answer 1</option>
                        <option value="answer2" @if($question->correct_answer === 'answer2') selected @endif >Answer 2</option>
                        <option value="answer3" @if($question->correct_answer === 'answer3') selected @endif >Answer 3</option>
                        <option value="answer4" @if($question->correct_answer === 'answer4') selected @endif >Answer 4</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">
                        Question Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
