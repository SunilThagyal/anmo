
    $(document).ready(function () {
        $('#form-submit').on('click', function () {
            // Prevent form submission for this example
            // You should modify this part to handle your actual form submission

            // Disable the button
            $(this).prop('disabled', true).css('background-color','#fe3f40');

            // Show the loading spinner
            $('.btn-spinner').removeClass('d-none');

            // Simulate a delay (replace this with your actual form submission logic)
            setTimeout(function () {
                // Enable the button
                $('#form-submit').prop('disabled', false);

                // Hide the loading spinner
                $('.btn-spinner').addClass('d-none');
            }, 3000); // Replace 3000 with the actual delay in milliseconds
            // ajax
            var form = $(this).closest('form');
            var url = form.attr('action');
            var message = form.find('#message').val()
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    message:message},
                success:function(response){
                    if (response.alert) {
                        // Append the alert Blade view to a container element
                        var html = $('#alert-container').html(response.alert);
                        html.find(".message").text(response.message);
                    }
                },
                error:function(error){

                }
            });
            /*ajax end*/
        });
    });
