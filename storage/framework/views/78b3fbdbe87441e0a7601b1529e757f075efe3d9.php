<!-- Client Logo area Starts -->
<div class="clent-logo-area body-bg-2" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="global-slick-init client-logo-slider dot-style-one dot-color-three dot-01 slider-inner-margin" data-infinite="true" data-dots="true" data-slidesToShow="5" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-responsive='[{"{"breakpoint": 1200,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 3}},{"breakpoint": 768, "settings": {"slidesToShow": 2} }]'
                     data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                    <?php $__currentLoopData = $data['brands']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slingle-client padding-0 style-03">
                            <a href="javascript:void(0)">
                                <?php echo render_image_markup_by_attachment_id($brand->image_id); ?>

                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Client Logo area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/aromatic/common/brand.blade.php ENDPATH**/ ?>