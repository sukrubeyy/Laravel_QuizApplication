<x-app-layout>
    <x-slot name="header">Quiz Create</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{old('title')}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="4">
                    {{old('description')}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="isWannaAddTime">Do you want to add finish time?</label>
                    <input type="checkbox" @if(old('finished_at')) checked @endif name="isWannaAddTime" id="isFinished">
                </div>
                <div id="finishedInput" @if(!old('finished_at')) style="display: none;" @endif class="form-group">
                    <input type="datetime-local" name="finished_at" class="form-control" value="{{old('finished_at')}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">
                        Create Quiz
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $('#isFinished').change(function() {
                if ($('#isFinished').is(':checked')) {
                    $('#finishedInput').show();
                } else
                    $('#finishedInput').hide();
            })
        </script>
    </x-slot>
</x-app-layout>
