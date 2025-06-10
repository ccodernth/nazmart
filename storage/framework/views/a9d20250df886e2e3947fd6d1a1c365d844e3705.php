 <div class="banner-area banner-two theme-three" data-padding-top="<?php echo e($data['padding_top']); ?>"
      data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
     <div class="container container-one">
         <div class="row justify-content-center">
             <div class="col-lg-12">
                 <div class="banner-content-wrapper section-bg-6">
                     <div class="global-slick-init recent-slider nav-style-one" data-infinite="true" data-arrows="true"
                          data-dots="false" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="6000"
                          data-prevArrow='<div class="prev-icon"><i class="las la-angle-left"></i></div>'
                          data-nextArrow='<div class="next-icon"><i class="las la-angle-right"></i></div>'
                          data-rtl="<?php echo e(get_user_lang_direction() == 1 ? 'true' : 'false'); ?>">
                         <?php $__currentLoopData = $data['repeater_data']['title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <?php
                                 $title = esc_html($value) ?? '';
                                 $subtitle = esc_html($data['repeater_data']['subtitle_'][$key]) ?? '';
                                 $button_text = esc_html($data['repeater_data']['shop_button_text_'][$key]) ?? '';
                                 $button_url = esc_url($data['repeater_data']['shop_button_url_'][$key]) ?? '';
                                 $figure_image = $data['repeater_data']['figure_image_'][$key] ?? '';
                             ?>

                             <div class="banner-image">
                                 <div class="row align-items-center flex-row-reverse">
                                     <div class="col-lg-6">
                                         <div class="banner-image-thumb">
                                             <?php echo render_image_markup_by_attachment_id($figure_image); ?>

                                         </div>
                                     </div>
                                     <div class="col-lg-6">
                                         <div class="banner-image-content">
                                             <h1 class="banner-image-content-title fw-400 mt-3">
                                                 <a href="javascript:void(0)"> <?php echo get_tenant_highlighted_text($title, 'banner-image-content-title-span'); ?> </a>
                                             </h1>
                                             <p class="banner-image-content-para mt-4"> <?php echo e($subtitle); ?> </p>
                                             <div class="btn-wrapper">
                                                 <?php if(!empty($button_url) && !empty($button_text)): ?>
                                                     <a href="<?php echo e($button_url); ?>"
                                                        class="cmn-btn cmn-btn-bg-4 radius-0 mt-4 mt-lg-5"> <?php echo e($button_text); ?> </a>
                                                 <?php endif; ?>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/medicom/header/header.blade.php ENDPATH**/ ?>