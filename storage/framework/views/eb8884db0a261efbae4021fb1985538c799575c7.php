<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('All Blogs')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e(__('All Blogs')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-data'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="shop-area padding-top-100 padding-bottom-50">
        <div class="container-one">
            <div class="shop-contents-wrapper">
                <div class="shop-icon">
                    <div class="sidebar-icon">
                        <i class="las la-bars"></i>
                    </div>
                </div>
                <div class="shop-sidebar-content">
                    <?php echo $__env->make('blog::tenant.frontend.partial.blog.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="shop-grid-contents">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="shop-left">
                                <?php
                                    $pagination_data = $blogs->withQueryString()->toArray();
                                ?>
                                <span
                                    class="showing-results color-light me-3"> <?php echo e(__('Showing')); ?> <?php echo e($pagination_data['from']); ?>-<?php echo e($pagination_data['to']); ?> <?php echo e(__('of')); ?>  <?php echo e($pagination_data['total']); ?> <?php echo e(__('results')); ?> </span>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="shop-right">
                                <div class="single-shops">
                                    <form action="<?php echo e(URL::current()); ?>" method="GET" id="sorting-form">
                                        <input type="hidden" name="sort">
                                        <div class="shop-nice-select" id="nice-select">
                                            <select>
                                                <option
                                                    value="1" <?php echo e($order_type == 1 ? 'selected' : ''); ?>> <?php echo e(__('Short By Name')); ?> </option>
                                                <option
                                                    value="2" <?php echo e($order_type == 2 ? 'selected' : ''); ?>> <?php echo e(__('Short By Ascending')); ?> </option>
                                                <option
                                                    value="3" <?php echo e($order_type == 3 ? 'selected' : ''); ?>> <?php echo e(__('Short By Descending')); ?> </option>
                                            </select>
                                        </div>
                                    </form>
                                    <ul class="shop-flex-icon tabs">
                                        <li class="shop-icons" data-tab="tab-grid">
                                            <a href="javascript:void(0)" class="icon"> <i class="las la-bars"></i> </a>
                                        </li>
                                        <li class="shop-icons active" data-tab="tab-grid2">
                                            <a href="javascript:void(0)" class="icon"> <i class="las la-border-all"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab-grid2" class="tab-content-item active">
                        <div class="row mt-2 gy-5">
                            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-xxl-4 col-lg-6 col-md-6">
                                    <div class="single-blog-two">
                                        <div class="single-blog-two-thumbs">
                                            <a href="<?php echo e(tenant_blog_single_route($blog->slug)); ?>">
                                                <?php echo render_image_markup_by_attachment_id($blog->image); ?>

                                            </a>
                                            <div class="single-blog-two-thumbs-date">
                                                <a href="javascript:void(0)">
                                                    <span class="date"> <?php echo e($blog->created_at?->format('d')); ?> </span>
                                                    <span class="month"> <?php echo e($blog->created_at?->format('M')); ?> </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="single-blog-two-contents mt-3">
                                            <h4 class="single-blog-two-contents-title mt-3">
                                                <a href="<?php echo e(tenant_blog_single_route($blog->slug)); ?>"> <?php echo purify_html(Str::words($blog->title, 10)); ?> </a>
                                            </h4>
                                            <div class="single-blog-two-contents-tags mt-3">

                                                <?php if(!empty($blog->tags)): ?>
                                                    <span class="single-blog-two-contents-tags-item">
                                                        <?php
                                                            $tags = explode(',',$blog->tags);
                                                        ?>

                                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($loop->index >= 3) break; ?>
                                                            <a href="<?php echo e(tenant_blog_tag_route(Str::slug($tag))); ?>"> <i
                                                                        class="las la-tag"></i> <?php echo e($tag); ?> </a>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </span>
                                                <?php endif; ?>


                                                <?php if(count($blog->comments) > 0): ?>
                                                    <span class="single-blog-two-contents-tags-item">
                                                        <a href="<?php echo e(url(tenant_blog_single_route($blog->slug).'/#comment-area')); ?>">  <?php echo e(count($blog->comments)); ?> <?php echo e(count($blog->comments) == 1 ? __('Comment') : __('Comments')); ?> </a>
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-xxl-12 col-lg-12 col-md-12">
                                    <h4 class="alert alert-warning text-center"><?php echo e(__('No Blog Available')); ?></h4>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="pagination-custom mt-5">
                            <?php if(count($blogs) > 0): ?>
                                <?php echo e($blogs->links()); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                    <div id="tab-grid" class="tab-content-item">
                        <div class="row mt-2 gy-5">
                            <?php $__empty_1 = true; $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="col-sm-12">
                                    <div class="single-flex-blog d-flex align-items-center">
                                        <?php
                                            $img = get_attachment_image_by_id($blog->image);
                                        ?>
                                        <div class="single-flex-blog-thumbs flex-blog-height bg-image"
                                             style="background-image: url(<?php echo e(!empty($img) ? $img['img_url'] : ''); ?>);">
                                        </div>
                                        <div class="single-flex-blog-contents mt-0 mt-xxs-3">
                                            <span
                                                class="single-flex-blog-contents-dates"> <?php echo e($blog->created_at?->format('d M Y')); ?> </span>
                                            <h4 class="single-flex-blog-contents-title fw-500 mt-3">
                                                <a href="<?php echo e(tenant_blog_single_route($blog->slug)); ?>"> <?php echo purify_html(Str::words($blog->title, 10)); ?> </a>
                                            </h4>
                                            <p class="single-flex-blog-contents-para mt-4"> <?php echo purify_html(Str::words($blog->blog_content, 50)); ?> </p>
                                            <div class="single-blog-two-contents-tags mt-3">
                                            <span class="single-blog-two-contents-tags-item">
                                                <?php
                                                    $tags = explode(',',$blog->tags);
                                                ?>

                                                <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($loop->index >= 5) break; ?>
                                                    <a href="<?php echo e(tenant_blog_tag_route(Str::slug($tag))); ?>"
                                                       class="ff-jost"> <i class="las la-tag"></i> <?php echo e($tag); ?> </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </span>
                                                <?php if(count($blog->comments) > 0): ?>
                                                    <span class="single-blog-two-contents-tags-item">
                                                    <a href="<?php echo e(url(tenant_blog_single_route($blog->slug).'/#comment-area')); ?>">  <?php echo e(count($blog->comments)); ?> <?php echo e(count($blog->comments) == 1 ? __('Comment') : __('Comments')); ?> </a>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="col-sm-12">
                                    <h4 class="alert alert-warning text-center"><?php echo e(__('No Blog Available')); ?></h4>
                                </div>
                            <?php endif; ?>

                            <div class="pagination-custom mt-5">
                                <?php if(count($blogs) > 0): ?>
                                    <?php echo e($blogs->links()); ?>

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        (function ($) {
            $(document).ready(function () {
                $(document).on('click', '.shop-nice-select .list li', function (e) {
                    e.preventDefault();
                    let form = $('#sorting-form');
                    let input = $('input[name=sort]');

                    let el = $(this);
                    let sort_value = el.data('value');

                    input.val(sort_value);
                    form.trigger('submit');
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/tenant/frontend/blog/blog-all.blade.php ENDPATH**/ ?>