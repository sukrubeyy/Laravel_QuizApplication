<x-app-layout>
    <x-slot name="header">
        Quizs
    </x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>Create Quiz</a>
            </h5>
            <form method="GET" action="">
                <div class="form-row">
                    <div class="col-md-2">
                        <input type="text" value="{{request()->get('title')}}" name="title" placeholder="Quiz Name" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <select name="status" onchange="this.form.submit()" class="form-control">
                            <option value="">Choose Status</option>
                            <option @if(request()->get('status')=='publish') selected @endif value="publish">Publish</option>
                            <option @if(request()->get('status')=='draft') selected @endif value="draft">Draft</option>
                            <option @if(request()->get('status')=='passive') selected @endif value="passive">Passive</option>
                        </select>
                    </div>
                    @if(request()->get('title') || request()->get('status'))
                    <div class="col-md-2">
                        <a href="{{route('quizzes.index')}}" class="btn btn-secondary">Sıfırla</a>
                    </div>
                    @endif
                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                        <td>{{$quiz->title}}</td>
                        <td>{{$quiz->status}}</td>
                        <td>{{$quiz->finished_at}}</td>
                        <td>
                            <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-primary btn-warning"><i class="fa fa-question"></i></a>
                            <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                            <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->withQueryString()->links()}}
        </div>
    </div>
</x-app-layout>
