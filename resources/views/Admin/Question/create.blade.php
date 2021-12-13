<x-app-layout>
    <x-slot name="header">Question Create For <i style="font-weight: bold;">{{$quiz->title}}</i> Quiz</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('questions.store',$quiz->id)}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Question</label>
                    <textarea name="question" class="form-control" rows="4">{{old('question')}}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 1</label>
                            <textarea name="answer1" rows="4" class="form-control">{{old('answer1')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 2</label>
                            <textarea name="answer2" rows="4" class="form-control">{{old('answer2')}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 3</label>
                            <textarea name="answer3" rows="4" class="form-control">{{old('answer3')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Answer 4</label>
                            <textarea name="answer4" rows="4" class="form-control">{{old('answer4')}}</textarea>
                        </div>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <label>Correct Answer</label>
            <select name="correct_answer">
                <option value="answer1" @if(old('answer1')==='answer1') selected @endif>Answer 1</option>
                <option value="answer2" @if(old('answer2')==='answer2') selected @endif>Answer 2</option>
                <option value="answer3" @if(old('answer3')==='answer3') selected @endif>Answer 3</option>
                <option value="answer4" @if(old('answer4')==='answer4') selected @endif>Answer 4</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-sm btn-block">
                Create Quiz
            </button>
        </div>
        </form>
    </div>
    </div>


</x-app-layout>
