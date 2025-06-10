<?php
    if (str_contains($data['title'], '{h}') && str_contains($data['title'], '{/h}'))
    {
        $text = explode('{h}',$data['title']);

        $highlighted_word = explode('{/h}', $text[1])[0];

        $highlighted_text = '<span class="section-shape title-shape">'. $highlighted_word .'</span>';
        $final_title = '<h2 class="title">'.str_replace('{h}'.$highlighted_word.'{/h}', $highlighted_text, $data['title']).'</h2>';
    } else {
        $final_title = '<h2 class="title">'. $data['title'] .'</h2>';
    }
?>

<section class="themes-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>"
         data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e($data['section_id']); ?>">
    <div class="theme-shape">
        <?php echo render_image_markup_by_attachment_id($data['bg_shape_image']); ?>

    </div>
    <div class="container">
        <div class="section-title">
            <?php echo $final_title; ?>

            <p class="section-para"> <?php echo e($data['subtitle']); ?> </p>
        </div>
        <div class="row mt-4">

            <?php $__currentLoopData = getAllThemeData(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $theme): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $theme_slug = $theme->slug;
                    $theme_data = getIndividualThemeDetails($theme_slug);
                    $theme_image = loadScreenshot($theme_slug);

                    $theme_custom_name = get_static_option_central($theme_data['slug'].'_theme_name');
                    $theme_custom_url = get_static_option_central($theme_data['slug'].'_theme_url');
                    $custom_theme_image = get_static_option_central($theme_data['slug'].'_theme_image');
                ?>

                <div class="col-lg-4 col-sm-6 mt-4 <?php echo e($theme_slug); ?>-screenshot">
                    <div class="single-themes">
                        <div class="single-themes-thumb">
                            <a href="<?php echo e($theme_custom_url); ?>" target="_blank">
                                <img src="<?php echo e(!empty($custom_theme_image) ? $custom_theme_image : $theme_image); ?>" alt="">
                            </a>
                        </div>
                        <div class="single-themes-content mt-3">
                            <div class="single-themes-content-flex">
                                <h3 class="single-themes-content-title">
                                    <a href="<?php echo e($theme_custom_url); ?>"> <?php echo e(!empty($theme_custom_name) ? $theme_custom_name : $theme_data['name']); ?> </a>
                                </h3>
                                <a href="<?php echo e($theme_custom_url); ?>" class="single-themes-content-title-icon"
                                   target="_blank">
                                    <i class="las la-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





















































            <?php if(array_key_exists('theme_url', $data) && !empty($data['theme_url'])): ?>
                <div class="col-12" style="margin-top: 80px">
                    <div class="btn-wrapper text-center">
                        <a href="<?php echo e($data['theme_url']); ?>" class="cmn-btn cmn-btn-bg-1" <?php echo e($data['target'] ? 'target="_blank"' : '""'); ?>><?php echo e($data['theme_text'] ?? ''); ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/theme.blade.php ENDPATH**/ ?>