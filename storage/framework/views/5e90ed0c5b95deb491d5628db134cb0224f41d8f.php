<!-- Blog area Start -->
<section class="blog-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container-two">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left section-title-two">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>

                    <?php if(!empty($data['see_all_url']) && !empty($data['see_all_text'])): ?>
                        <a href="<?php echo e($data['see_all_url']); ?>">
                            <span class="see-all fs-18"> <?php echo e($data['see_all_text']); ?> </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row margin-top-10">
            <?php $__currentLoopData = $data['blogs']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $delay = '.1s';
                    $class = 'fadeInUp';

                    if ($loop->even)
                    {
                        $delay = '.2s';
                        $class = 'fadeInDown';
                    }
                ?>
                <div class="col-xl-4 col-md-6 col-sm-6 col-6 margin-top-30 wow <?php echo e($class); ?>" data-wow-delay="<?php echo e($delay); ?>">
                    <div class="single-blog style-02 bg-item-four radius-20">
                        <a href="<?php echo e(route('tenant.frontend.blog.single', $blog->slug)); ?>" class="blog-image radius-10">
                            <?php echo render_image_markup_by_attachment_id($blog->image, 'lazyloads'); ?>

                        </a>

                        <div class="contents">
                            <h3 class="blog-title ff-jost">
                                <a href="<?php echo e(route('tenant.frontend.blog.single', $blog->slug)); ?>"> <?php echo e(blog_limited_text($blog->title)); ?> </a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- Blog area end -->
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/casual/blog/blog.blade.php ENDPATH**/ ?>