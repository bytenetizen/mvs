$(function() {

    function sendUserData(form) {

        const formId = $(form).attr('id');
        const action = $(form).attr('action');
        const method = $(form).attr('method');

        var $that = $(form),
            formData = new FormData($that.get(0));

        $.ajax({
            statusCode: {
                419: function(){
                    location.reload();
                },
                401: function(){
                    location.reload();
                },
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: method,
            url: action,
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status === 'register'){
                    alert(successRegister);
                }

                if(data.redirect){
                    location=data.redirect;
                }
            },
            error: function (data) {
                $.each(data.responseJSON.data, function (key, value) {
                    $('#'+ key).addClass('is-invalid');
                    $('#'+ key + '-error').text(value);
                    $('#'+ key + '-error').show();
                });
            }
        });

    }
    $.validator.methods.goodString = function( value, element ) {
        return this.optional( element ) || /^[A-Za-zА-Яа-я]*$/.test( value );
    };
    $.validator.methods.goodPass = function( value, element ) {
        return this.optional( element ) || /^[A-Za-zА-Яа-я0-9]*$/.test( value );
    };
    $("#registerForm").validate({
        rules: {
            name:{
                required: true,
                goodString: true,
                minlength:3,
                maxlength:50,
            },
            surName:{
                required: true,
                goodString: true,
                minlength:3,
                maxlength:50,
            },
            email: {
                required: true,
                email: true,
                maxlength:50,
            },
            password:{
                required: true,
                goodPass: true,
                minlength:6,
                maxlength:50,
            },
            repeatPassword:{
                required: true,
                goodPass: true,
                equalTo: '#password',
                minlength:6,
                maxlength:50,
            },
        },
        messages: {
            surName: {
                required: requiredText,
                goodString: goodString,
                minlength: minlengthText,
                maxlength: maxlengthText,
            },
            name: {
                required: requiredText,
                goodString: goodString,
                minlength: minlengthText,
                maxlength: maxlengthText,
            },
            email: {
                required: requiredTextEmail,
                email: requiredCheckEmail,
                maxlength: maxlengthText,
            },
            password: {
                required: requiredText,
                goodPass: goodString,
                minlength: minlengthText,
                maxlength: maxlengthText,
            },
            repeatPassword: {
                required: requiredText,
                goodPass: goodString,
                minlength: minlengthText,
                maxlength: maxlengthText,
                equalTo: equalToText,
            },
            userAvatar: {
                required: requiredText,
                accept: 'png|gif|jpeg'
            },
        },
        validClass: "is-valid",
        errorClass: "is-invalid",
        focusCleanup: true,
        success: function(label) {
            label.addClass("is-valid").text(successText)
        },
        debug: false,
        submitHandler: function(form,event) {
            event.preventDefault();
            $('button').prop('disabled', true);
            setTimeout(function() {
                $('button').prop('disabled', false);
            }.bind('button'), 5000);
            sendUserData(form);
        }
    });

    var uploadField = document.getElementById('userAvatar');

    if(uploadField){
        uploadField.onchange = function() {
            var splittedFakePath = this.value.split('\\');
            $('#custom-file-label').text(splittedFakePath[splittedFakePath.length - 1]);
            if(this.files[0].size > 307200){
                alert('File is too big!');
                this.value = "";
            };
        };
    }



    $("#loginForm").validate({
        rules: {
            email: {
                required: true,
                email: true,
                maxlength:50,
            },
            password:{
                required: true,
                goodPass: true,
                minlength:6,
                maxlength:50,
            }
        },
        messages: {
            email: {
                required: requiredText,
                email: requiredText,
                maxlength: maxlengthText,
            },
            password: {
                required: requiredText,
                goodPass: goodString,
                minlength: minlengthText,
                maxlength: maxlengthText,
            }
        },
        validClass: "is-valid",
        errorClass: "is-invalid",
        focusCleanup: true,
        success: function(label) {
            label.addClass("is-valid").text(successText)
        },
        debug: false,
        submitHandler: function(form,event) {
            event.preventDefault();
            $('button').prop('disabled', true);
            setTimeout(function() {
                $('button').prop('disabled', false);
            }.bind('button'), 5000);
            sendUserData(form);
        }
    });
});