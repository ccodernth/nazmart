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

<section class="choose-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>" id="<?php echo e($data['section_id']); ?>">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-5 mt-4">
                <div class="choose-thumb-content">
                    <?php echo \App\Facades\ImageRenderFacade::getParent($data['section_image'] ?? '', 'thumb')->getGrandChild(is_lazy: true)->render(); ?>

                </div>
            </div>
            <div class="col-xl-7 col-lg-9 mt-4">
                <div class="choose-wrapper">
                    <div class="section-title text-left">
                        <?php echo $final_title; ?>

                        <p class="section-para"> <?php echo e($data['subtitle']); ?> </p>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12">
                            <?php if(array_key_exists('repeater_title_', $data['repeater_data'])): ?>
                                <?php $__currentLoopData = $data['repeater_data']['repeater_title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="single-choose bg-white radius-10 mt-4">
                                        <div class="single-choose-flex">
                                            <div class="single-choose-icon radius-10">
                                                <?php echo render_image_markup_by_attachment_id($data['repeater_data']['repeater_image_'][$key] ?? ''); ?>

                                            </div>
                                            <div class="single-choose-content">
                                                <h3 class="single-choose-content-title">
                                                    <a href="javascript:void(0)"> <?php echo e($data['repeater_data']['repeater_title_'][$key]); ?> </a>
                                                </h3>
                                                <p class="single-choose-content-para"> <?php echo e($data['repeater_data']['repeater_subtitle_'][$key]); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/why-choose.blade.php ENDPATH**/ ?>