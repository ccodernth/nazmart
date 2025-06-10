<script>
    $(document).on('click', '.newsletter-submit-btn', function (e) {
        e.preventDefault();

        var email = $('.subscribe-form input.email').val();

        var errrContaner = $(this).parent().parent().find('.form-message-show');
        errrContaner.html('');
        var el = $(this);

        $.ajax({
            url: "{{route('tenant.frontend.subscribe.newsletter')}}",
            type: "POST",
            data: {
                _token: "{{csrf_token()}}",
                email: email
            },

            beforeSend: function() {
                $('.loader').show();
                el.text('Submiting..');
                el.attr('disabled', true);
            },

            success: function (data) {
                console.log(data)
                $('.loader').hide();
                $('.email').val('');
                el.text("{{ __('SubscribeNewsletter') }}");
                el.attr('disabled', false);
                errrContaner.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
            },
            error: function (data) {
                $('.loader').hide();
                el.text("{{ __('SubscribeNewsletter') }}");
                el.attr('disabled', false);
                var errors = data.responseJSON.errors;
                errrContaner.html('<div class="alert alert-danger">' + errors.email[0] + '</div>');
            }
        });
    });
</script>
