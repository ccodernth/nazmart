<section class="blog-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>"  id="<?php echo e($data['section_id']); ?>">
    <div class="container">
        <div class="load-more-items-wrapper">
            <div class="row load-more-items" id="load-more-items">
                <?php $__empty_1 = true; $__currentLoopData = $data['blogs'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6 mt-4">
                        <div class="single-blog">
                            <div class="single-blog-thumb blurred-img" <?php echo render_preloaded_image($blog->image); ?>>
                                <a href="<?php echo e(route('landlord.frontend.blog.single',$blog['slug'])); ?>">
                                    <?php echo render_image_markup_by_attachment_id($blog->image ?? '', '', 'full', false, is_lazy: true); ?>

                                </a>
                            </div>
                            <div class="single-blog-contents mt-4">
                                <h2 class="single-blog-contents-title"> <a href="<?php echo e(route('landlord.frontend.blog.single',$blog['slug'])); ?>"> <?php echo e(Str::words($blog->title)); ?> </a> </h2>
                                <div class="single-blog-contents-bottom mt-4">
                                    <a href="<?php echo e(route('landlord.frontend.blog.single',$blog['slug'])); ?>" class="reading-btn"> <?php echo e(__('Keep Reading')); ?> <i class="las la-arrow-right"></i> </a>
                                    <span class="min-reading"> <?php echo e($blog->created_at->format('d M Y')); ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-lg-12 col-md-12">
                        <h4 class="text-center text-warning"><?php echo e(__('No Data Available')); ?></h4>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="btn-wrapper click-attr center-text mt-4 mt-lg-5">
            <a href="javascript:void(0)" class="cmn-btn cmn-btn-bg-1" id="load_more"
               data-category="<?php echo e($data['category_id']); ?>"
               data-order="<?php echo e($data['order']); ?>"
               data-order_by="<?php echo e($data['order_by']); ?>"
            > <?php echo e(__('Load More')); ?> </a>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/blog/blog-style-one.blade.php ENDPATH**/ ?>