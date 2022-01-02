<x-app-layout>
    <x-slot name="header">Quiz Edit</x-slot>

    <div class="card">
        <div class="card-body">
            <form action="{{route('quizzes.update',$quiz->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$quiz->title}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="4">{{$quiz->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="isWannaAddTime">Select Status</label>
                    <select name="status" class="form-control">
                        <option value="draft" @if($quiz->status=='draft') selected @endif>Draft</option>
                        <option value="publish" @if($quiz->status=='publish') selected @endif>Publish</option>
                        <option value="passive" @if($quiz->status=='passive') selected @endif>Passive</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="isWannaAddTime">Do you want to add finish time?</label>
                    <input type="checkbox" @if($quiz->finished_at) checked @endif name="isWannaAddTime" id="isFinished">
                </div>
                <div id="finishedInput" @if(!$quiz->finished_at) style="display: none;" @endif class="form-group">
                    <input type="datetime-local" name="finished_at" class="form-control" @if($quiz->finished_at) value="{{date('Y-m-d\TH:i',strtotime($quiz->finished_at))}} @endif ">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">
                        Quiz Update
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
