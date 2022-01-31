<x-app-layout>
    <x-slot name="header">{{$quizDetails->title}}</x-slot>


    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if($quizDetails->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge alert-primary"> Finished Time</span>

                                <span class="badge badge alert-success">{{$quizDetails->finished_at->diffForHumans()}}</span>
                            </li>
                        @endif

                        @if($quizDetails->my_result)
                            <li class="list-group-item d-flex justify-content-between align-items-center">

                                <span class="badge alert-primary">Puan</span>
                                <span class="badge alert-success">{{$quizDetails->my_result->point}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge alert-primary">Answer Correct/Wrong</span>
                                <div class="float-right">
                                    <span class="badge alert-success">Correct {{$quizDetails->my_result->correct}}</span>
                                    <span class="badge alert-danger">Wrong {{$quizDetails->my_result->wrong}}</span>
                                </div>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span class="badge alert-primary">Question Count</span>
                            <span class="badge alert-success">{{$quizDetails->questions_count}}</span>
                        </li>

                        @if($quizDetails->details)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge alert-primary">User Count</span>
                                <span class="badge alert-success">{{$quizDetails->details['join_count']}}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span class="badge alert-primary">Avarage</span>
                                <span class="badge alert-success">{{$quizDetails->details['average']}}</span>
                            </li>
                        @endif
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
                            @if($quizDetails->my_result)
                            <a href="{{route('quiz.join',$quizDetails->slug)}}" class="btn btn-primary">Join Quiz</a>
                            @else
                            <a href="{{route('quiz.join',$quizDetails->slug)}}" class="btn btn-primary">Join View</a>
                            @endif
                        </div>

                </div>

            </div>
        </div>


</x-app-layout>
