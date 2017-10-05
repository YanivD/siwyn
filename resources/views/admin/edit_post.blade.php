@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <form method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">כותרת הפוסט</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="" value="{{ $post->title }}">
            </div>

            <div class="form-group">
                <label for="published_at">תאריך פרסום הפוסט</label>
                <input type="date" class="form-control" id="published_at" name="published_at" placeholder="" value="{{ Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}">
            </div>

            <div class="form-group">
                <label for="content">תוכן הפוסט</label>
                <textarea name="content" id="content">{{ $post->content }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">עדכני פוסט</button>
        </form>
    </div>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
    <script type="text/javascript">


        $( document ).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('#content').summernote({
                minHeight: 600,
                callbacks : {
                    onImageUpload : function (image) {
                        uploadImage(image[0]);
                    }
                }

            });
        })


        function uploadImage(image) {
            var data = new FormData();
            data.append("image",image);
            data.append("post_id", {{ $post->id }});
            $.ajax ({
                data: data,
                type: "POST",
                url: "/maya/upload_image",
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    toastr.info('מעלה תמונה <i style="font-size:30px" class="fa fa-spinner fa-spin" aria-hidden="true"></i>')
                },
                success: function(url) {
                    $('#content').summernote('insertImage', url);
                    toastr.clear()
                },
                error: function(data) {
                    console.log(data);
                    toastr.clear()
                }
            });
        }

    </script>
@endsection