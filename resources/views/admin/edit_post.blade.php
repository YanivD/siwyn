@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <form method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">כותרת הפוסט</label>
                <input required type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="published_at">תאריך פרסום הפוסט</label>
                <input required type="date" class="form-control" id="published_at" name="published_at" placeholder="" value="{{ Carbon\Carbon::parse($post->published_at)->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="content">תוכן הפוסט</label>
                <textarea name="content" id="content">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="is_published">מוצג באתר?</label>
                <input type="checkbox" style="-webkit-transform: scale(2);margin-right: 15px;" id="is_published" value="1" name="is_published" @if($post->is_published) checked="checked" @endif>
            </div>

            <button type="submit" class="btn btn-primary btn-lg">עדכני פוסט</button>
        </form>
    </div>
    <script type="text/javascript">
        PAGE_VARS = {
            editPostId: '{{ $post->id }}'
        };
    </script>
@endsection