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
    homepage: function() {
        if (location.hash && location.hash.length) {
            $('html, body').animate({
                'scrollTop':   $(location.hash).offset().top - 150
            }, 2000);
        }
    }
};
