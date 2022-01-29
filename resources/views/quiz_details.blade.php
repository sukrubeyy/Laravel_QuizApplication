<x-app-layout>
    <x-slot name="header">{{$quizDetails->title}}</x-slot>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quizDetails->finished_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Finished Time
                            <span class="badge alert-success">{{$quizDetails->finished_at->diffForHumans()}}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Question Count
                            <span class="badge alert-success">{{$quizDetails->questions_count}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            User Count
                            <span class="badge alert-success">10</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Avarage
                            <span class="badge alert-success">65</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <p class="card-text"></p>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <p class="mb-1">{{$quizDetails->description}}</p>
                                <small>@if($quizDetails->finished_at){{$quizDetails->finished_at->diffForHumans()}}@endif</small>
                            </div>
                            <a href="{{route('quiz.join',$quizDetails->slug)}}" class="btn btn-primary">Join Quiz</a>
                    </div>

                </div>

            </div>
        </div>


</x-app-layout>
