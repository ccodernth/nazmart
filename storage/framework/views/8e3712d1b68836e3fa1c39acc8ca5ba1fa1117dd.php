<?php $__env->startSection('title'); ?>
    <?php echo e($category_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($category_name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="blog-content-area padding-120 ">
        <div class="container">
            <div class="row">
                <?php $__empty_1 = true; $__currentLoopData = $all_blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog-grid margin-bottom-30">
                            <div class="thumb">
                                <a href="<?php echo e(route(route_prefix().'frontend.blog.single',$data->slug)); ?>">
                                    <?php echo render_image_markup_by_attachment_id($data->image); ?>

                                </a>
                            </div>
                            <div class="content mt-3">
                                <ul class="post-meta">
                                    <li>
                                        <a href="<?php echo e(route(route_prefix().'frontend.blog.single',$data->slug)); ?>"><i
                                                class="las la-calendar-alt"></i> <?php echo e($data->created_at->diffForHumans()); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route(route_prefix().'frontend.blog.single',$data->slug)); ?>">
                                            <?php echo e(__('By ')); ?>

                                            <i class="las la-user"></i><?php echo e(($data->author) ?? __("Anonymous")); ?></a>
                                    </li>
                                </ul>
                                <h4 class="title mt-3">
                                    <a href="<?php echo e(route(route_prefix().'frontend.blog.single', $data->slug)); ?>">
                                        <?php echo e($data->title); ?>

                                    </a>
                                </h4>
                                <div class="description mt-3">
                                    <?php echo e(str(strip_tags($data->blog_content,55))->limit(255)); ?>

                                </div>
                                <div class="btn-wrapper mt-3">
                                    <a href="<?php echo e(route(route_prefix().'frontend.blog.single', $data->slug)); ?>" class="readmore font-weight-bold"><?php echo e(__('Read More')); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-lg-12">
                        <div class="alert alert-danger">
                            <?php echo e(__('No Post Available In ').$category_name.__(' Category')); ?>

                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-lg-12">
                    <div class="pagination_wrapper">
                        <?php echo $all_blogs->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/landlord/frontend/blog/blog-category.blade.php ENDPATH**/ ?>