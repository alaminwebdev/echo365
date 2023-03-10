$(document).ready(function () {
    "use strict";

    $('#webTicker').webTicker({
        transition: "linear"
    });

    $('.magnific').magnificPopup({
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    $('.contact-submit').submit(function(e) {
        e.preventDefault();
        $('#loader').show();
        var form = this;
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData(form),
            processData: false,
            dataType: 'json',
            contentType: false,
            beforeSend: function() {
                $(form).find('span.error-text').text('');
            },
            success: function(response) {
                $('#loader').hide();
                if (response.code == 0) {
                    $.each(response.error_message, function(prefix, value) {
                        $(form).find('span.' + prefix + '_error').text(value[
                        0]);
                    });
                } else if (response.code == 1) {
                    $(form)[0].reset();
                    console.log(response.success_message);
                    
                }

            },
        });

    })

    

    

});
