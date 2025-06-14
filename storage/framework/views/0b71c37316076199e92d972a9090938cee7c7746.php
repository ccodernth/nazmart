
<!-- Contact area Starts -->
<section class="contact-theme-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container container-one">
        <div class="row gx-5">
            <div class="col-lg-4 mt-4">
                <div class="contact-left-wrapper">
                    <div class="section-title theme-one text-left">
                        <h2 class="title"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title'])); ?> </h2>
                    </div>
                    <div class="contact-contents mt-4">
                        <p class="contact-contents-para"> <?php echo e($data['description']); ?> </p>
                        <div class="contact-contents-inner mt-4 mt-lg-5">
                            <?php $__currentLoopData = $data['repeater_data']['repeater_info_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="contact-contents-inner-single">
                                <div class="contact-contents-inner-single-flex">
                                    <div class="contact-contents-inner-single-icon">
                                        <i class="<?php echo e($data['repeater_data']['repeater_icon_'][$key] ?? ''); ?>"></i>
                                    </div>
                                    <div class="contact-contents-inner-single-contents">
                                        <h4 class="contact-contents-inner-single-contents-title fw-500"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_info_'][$key]) ?? ''); ?> </h4>
                                        <span class="contact-contents-inner-single-contents-item"> <a href="javascript:void(0)"> <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['repeater_data']['repeater_sub_info_'][$key]) ?? ''); ?> </a> </span>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-4">
                <div class="contact-forms-wrapper">
                    <div class="section-title theme-one text-left">
                        <h2 class="title"> <?php echo e(__('Send us an Email')); ?> </h2>
                    </div>
                    <div class="contact-content-theme">
                        <?php if(!empty($data['custom_form_id'])): ?>
                            <?php $form_details = \App\Models\FormBuilder::find($data['custom_form_id']); ?>
                            <?php echo \App\Helpers\FormBuilderCustom::render_form(optional($form_details)->id,null,null,'btn-default'); ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact area end -->

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
    </script>

<?php $__env->stopSection(); ?>


<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/hexfashion/contact/contact-area.blade.php ENDPATH**/ ?>