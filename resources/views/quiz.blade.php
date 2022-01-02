<x-app-layout>
    <x-slot name="header">{{$quiz->title}}</x-slot>


    <div class="card">
        <div class="card-body">
            <form action="#" method="POST">
                @foreach($quiz->questions as $question)
                <strong>#{{$loop->iteration}}</strong> {{$question->question}}
                @if($question->image)
                    <img src="{{asset($question->image)}}" alt="Question Image" class="img-responsive">
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}1" value="answer1" required>
                    <label class="form-check-label" for="quiz{{$question->id}}1">
                        {{$question->answer1}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}2" required>
                    <label class="form-check-label" for="quiz{{$question->id}}2">
                        {{$question->answer2}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}3" required>
                    <label class="form-check-label" for="quiz{{$question->id}}3">
                        {{$question->answer3}}
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}4" required>
                    <label class="form-check-label" for="quiz{{$question->id}}4">
                        {{$question->answer2}}
                    </label>
                </div>
                <hr>
                <button type="submit" class="btn btn-success btn-sm btn-block">Take Assegment</button>
                @endforeach

            </form>
        </div>


</x-app-layout>
