toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "50000",
    "extendedTimeOut": "50000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

var SITE = {
    global: function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#addSubscribe').on('click', function (e) {
            $.ajax({
                type: 'get',
                url: SITE_VARS.addSubscriberUrl,
                data: {
                    email: $('#inputSubscribe').val()
                },
                success: function () {
                    $('#inputSubscribe').parent().addClass('has-success');
                    $('#inputSubscribe').siblings('.glyphicon')
                        .removeClass('glyphicon-envelope')
                        .addClass('glyphicon-ok');
                    $('#addSubscribe').html('נוספת בהצלחה לרשימה ');
                }
            })
        });
    },
    'admin.edit_post': function() {

        $('#content').summernote({
            minHeight: 600,
            callbacks : {
                onImageUpload : function (image) {
                    uploadImage(image[0]);
                }
            }
        });


        function uploadImage(image) {
            var data = new FormData();
            data.append("image",image);
            data.append("post_id", PAGE_VARS.editPostId);
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
    },
    homepage: function() {
        if (location.hash && location.hash.length) {
            $('html, body').animate({
                'scrollTop':   $(location.hash).offset().top - 150
            }, 2000);
        }
    }
};
