
    $(document).ready(function () {
        $('#form-submit').on('click', function () {
            var button = $(this).prop('disabled', true).css('background-color','#fe3f40');
            $('.btn-spinner').removeClass('d-none');
            var form = $(this).closest('form');
            var url = form.attr('action');
            var message = form.find('#message').val()
            /*testing*/
            var dataToSend = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                message: message
            };

            var successFunction = function(response) {
                if (response.alert) {
                    var html = $('#alert-container').html(response.alert);
                    html.find(".message").text(response.message);
                }
                $('.btn-spinner').addClass('d-none');
                button.text('Message has been Sent Successfully');
                button.prop('disabled', true);
                form.find('#message').prop("readonly", true);
            };

            var errorFunction = function(error) {
                button.prop('disabled', false);
                // Handle error, if needed
            };
            makeAjaxRequest(url, 'POST', dataToSend, successFunction, errorFunction);
            // $.ajax({
            //     type: "POST",
            //     url: url,
            //     data:{
            //         _token : $('meta[name="csrf-token"]').attr('content'),
            //         message:message},
            //     success:function(response){
            //         if (response.alert) {
            //             // Append the alert Blade view to a container element
            //             var html = $('#alert-container').html(response.alert);
            //             html.find(".message").text(response.message);
            //         }
            //         $('.btn-spinner').addClass('d-none');
            //         button.text('Message has been Sent Successfully')
            //         button.prop('disabled', true);
            //         form.find('#message').prop("readonly",true)

            //         $('.btn-spinner').prop("disable",'true')

            //     },
            //     error:function(error){
            //         button.prop('disabled', false);
            //     }
            // });
            /*ajax end*/
        });
    });
