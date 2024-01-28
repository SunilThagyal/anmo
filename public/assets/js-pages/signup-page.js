$(document).ready(function() {
    $('.signup_form').validate({
        rules: {
            full_name: {
                required: true,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
            },
            confirm_password: {
                required: true,
                equalTo: '#password',
            }
        },
        messages: {
            full_name: 'Please enter your full name',
            email: {
                required: 'Please enter your email',
                email: 'Please enter a valid email address',
            },
            password: 'Please enter a password',
            confirm_password: {
                required: 'Please confirm your password',
                equalTo: 'Passwords do not match',
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.closest(".form-group").find(".invalid-feedback"));
            element.closest(".form-group").find('input').addClass('is-invalid');
        },
        success: function(label, element) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            var button = $(form).find('button[type="submit"]');
            button.prop('disabled', true).css('background-color','#fe3f40');
            $('.btn-spinner').removeClass('d-none');
            var formData = $(form).serialize(); // Serialize form data
            var url = $(form).attr('action'); // Get the form action attribute value
            var successFunction = function(response){
                console.log(response.status);
                if(response.status == 'success'){
                    if(response.alert){
                        var html = $(form).closest('.card-body').find('#alert-container').html(response.alert);
                        html.find(".message").text(response.message);
                    }
                    $('.btn-spinner').addClass('d-none');
                }
            }
            makeAjaxRequest(url,'POST',formData, successFunction);
            return false; // Prevent the default form submission
        }
    });
});
