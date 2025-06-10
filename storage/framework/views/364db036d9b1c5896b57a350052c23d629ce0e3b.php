<div class="clent-logo-area" data-padding-top="<?php echo e($data['padding_top']); ?>"
     data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">>
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="global-slick-init client-logo-slider dot-style-one slider-inner-margin" data-infinite="true"
                     data-arrows="true" data-dots="true" data-slidesToShow="5" data-swipeToSlide="true"
                     data-autoplay="true" data-autoplaySpeed="2500"
                     data-responsive='[{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768, "settings": {"slidesToShow": 2} }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['brands'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="client-logo-single">
                            <div class="slingle-client">
                                <a href="javascript:void(0)">
                                    <?php echo render_image_markup_by_attachment_id($brand->image_id, 'lazyloads'); ?>

                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/common/brand.blade.php ENDPATH**/ ?>