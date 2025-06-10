<section class="blog-area position-relative" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">>
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title justify-content-center">
                    <h2 class="title"> <?php echo e($data['title'] ?? ''); ?> </h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-10 padding-top-10">
            <?php $__currentLoopData = $data['blogs'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $class_delay = $loop->odd ? ['fadeInUp', '.1s'] : ['fadeInDown', '.2s'];

                    $image_markup = \App\Facades\ImageRenderFacade::getParent($blog->image)
                            ->getChild(tenant_blog_single_route($blog->slug), 'blog-image')
                            ->getGrandchild('radius-0')
                            ->renderAll();

                    $category_name = $blog?->category?->title;
                    $category_slug = $blog?->category?->slug;
                ?>

                <div class="col-lg-3 col-md-4 col-sm-6 col-6 margin-top-30 wow <?php echo e(current($class_delay)); ?>" data-wow-delay="<?php echo e(last($class_delay)); ?>">
                    <div class="single-blog">
                        <?php echo $image_markup; ?>


                        <div class="contents">
                            <span class="category color-four">
                                <a href="<?php echo e(tenant_blog_category_route($category_slug)); ?>"> <?php echo e($category_name); ?> </a>
                            </span>

                            <h3 class="blog-grid-title hover-color-four">
                                <a href="<?php echo e(tenant_blog_single_route($blog->slug)); ?>"> <?php echo e(blog_limited_text($blog->title)); ?> </a>
                            </h3>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/electro/blog/blog.blade.php ENDPATH**/ ?>