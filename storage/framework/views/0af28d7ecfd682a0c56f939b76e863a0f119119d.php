<!-- Contact Area Starts -->
<section class="contact-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row align-items-center">
            <div class="col-xl-5 col-lg-6 margin-top-30">
                <div class="contact-wrappers bg-item-four">
                    <div class="contacts-content">
                        <h2 class="contact-title"> <?php echo e($data['title'] ?? ''); ?> </h2>
                        <?php $__currentLoopData = $data['repeater_data']['repeater_info_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-contact-item margin-top-30">
                                <span class="item-title"> <?php echo e(esc_html($data['repeater_data']['repeater_info_'][$key]) ?? ''); ?> </span>
                                <span class="item-para"> <?php echo e(esc_html($data['repeater_data']['repeater_sub_info_'][$key]) ?? ''); ?> </span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-6 margin-top-30">
                <div class="contact-form">
                    <?php if(!empty($data['custom_form_id'])): ?>
                        <?php
                            $form_details = \App\Models\FormBuilder::find($data['custom_form_id']);
                        ?>
                    <?php endif; ?>

                    <?php echo \App\Helpers\FormBuilderCustom::render_form(optional($form_details)->id,null,null,'btn-default'); ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Area end -->



<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).on('submit', '.custom-form-builder-ten', function (e) {
            e.preventDefault();
            var btn = $('#contact_form_btn');
            var form = $(this);
            var formID = form.attr('id');
            var msgContainer =  form.find('.error-message');
            var formSelector = document.getElementById(formID);
            var formData = new FormData(formSelector);
            msgContainer.html('');
            $.ajax({
                url: "<?php echo e(route(route_prefix().'frontend.form.builder.custom.submit')); ?>",
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
                },
                beforeSend:function (){
                    btn.html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Submitting..")); ?>');
                },
                processData: false,
                contentType: false,
                data:formData,
                success: function (data) {
                    form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                    msgContainer.html('<div class="alert alert-'+data.type+'">' + data.msg + '</div>');
                    btn.text('<?php echo e(__("Submit Message")); ?>');
                    form[0].reset();

                },
                error: function (data) {

                    form.find('.ajax-loading-wrap').removeClass('show').addClass('hide');
                    var errors = data.responseJSON.errors;
                    var markup = '<ul class="alert alert-danger">';

                    $.each(errors,function (index,value){
                        markup += '<li>'+value+'</li>';})
                    markup += '</ul>';


                    msgContainer.html(markup);
                    btn.text('<?php echo e(__("Submit Message")); ?>');
                }
            });
        });

        $(document).ready(function () {
            let contact_form_name = `<?php echo e($form_details->title ?? ''); ?>`;
            let appendable = `<label class="contact-title" for="#"> ${contact_form_name} </label>`;
            let form = $('.contact-form form');

            form.prepend(appendable);
            form.find('textarea').attr('rows', 3);
            $('.contact-title').addClass('mb-4');
        });
    </script>

<?php $__env->stopSection(); ?>


<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/contact/contact-area.blade.php ENDPATH**/ ?>