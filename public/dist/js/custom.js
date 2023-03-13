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

    $('#contact_submit').submit(function(e) {
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
                if (response.status == 'success') {
                    $('#loader').hide();
                    $(form)[0].reset();
                    console.log(response.status);
                }
            },
            error:function(err){
                $('#loader').hide();
                let error = err.responseJSON;
                $.each(error.errors, function(prefix, value) {
                    $(form).find('span.' + prefix + '_error').text(value[
                    0]);
                });
                console.log(error.errors)
            }
        });

    });

    $('#add_subscribe').submit(function(e) {
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
                if (response.status == 'success') {
                    $('#loader').hide();
                    $(form)[0].reset();
                    console.log(response.status);
                }
            },
            error:function(err){
                $('#loader').hide();
                let error = err.responseJSON;
                $.each(error.errors, function(prefix, value) {
                    $(form).find('span.' + prefix + '_error').text(value[
                    0]);
                    console.log(value[0]);
                });
                console.log(error);
            }
        });

    })

    

    

});
