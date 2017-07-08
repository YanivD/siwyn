@extends('layout')

@section('content')
    <div class="container" style="margin-bottom: 30px">
        <form method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label for="title">כותרת הפוסט</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="">
            </div>

            <div class="form-group">
                <label for="published_at">תאריך פרסום הפוסט</label>
                <input type="date" class="form-control" id="published_at" name="published_at" placeholder="">
            </div>

            <div class="form-group">
                <label for="content">תוכן הפוסט</label>
                <textarea name="content" id="content"></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block">שלחי פוסט</button>
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
            $.ajax ({
                data: data,
                type: "POST",
                url: "/maya/upload_image",
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    $('#content').summernote('insertImage', url);
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

    </script>
@endsection