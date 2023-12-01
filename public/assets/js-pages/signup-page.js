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
        submitHandler: function(form) {
            // Form is valid, and you can submit it.
            form.submit();
        }
    });
});
