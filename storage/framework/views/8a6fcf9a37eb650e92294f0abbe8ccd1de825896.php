<div class="comment-area padding-top-60 padding-bottom-60" id="comment-area">
    <h3 class="details-section-title"> <?php echo e(__('Comments')); ?> <?php echo e($blog_comments_count ? '('.$blog_comments_count.')' : ''); ?> </h3>
    <div class="row">
        <div class="col-lg-12 mt-2">
            <div class="comment-show-contents" id="comment_data" data-items="<?php echo e($blog_comments->count()); ?>">

                <ul class="comment-list wow fadeInLeft" data-wow-delay=".1s">
                    <?php $__currentLoopData = $blog_comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $avatar_image =
                            $commented_user_image = render_image_markup_by_attachment_id($data?->user?->image ?? get_static_option('blog_avater_image'),'','');
                        ?>

                        <li>
                            <div class="blog-details-flex-content">
                                <div class="blog-details-thumb radius-10">
                                    <?php echo $commented_user_image; ?>

                                </div>
                                <div class="blog-details-content">
                                    <div class="blog-details-content-flex">
                                        <div class="blog-details-content-item">
                                            <h5 class="blog-details-content-title"><a
                                                    href="javascript:void(0)" class="title" data-parent_name="<?php echo e(optional($data->user)->name); ?>"> <?php echo e(optional($data->user)->name ?? ''); ?> </a>
                                            </h5>
                                            <span
                                                class="blog-details-content-date"> <?php echo e(date('d F Y', strtotime($data->created_at ?? ''))); ?> </span>
                                        </div>

                                        <?php if(auth('web')->check() && auth('web')->user()->id != $data->user_id): ?>
                                            <a href="javascript:void(0)" class="reply-btn btn-replay" data-comment_id="<?php echo e($data->id); ?>"> <i
                                                    class="las la-reply-all"></i> <?php echo e(__('Reply')); ?> </a>
                                        <?php endif; ?>
                                    </div>
                                    <p class="blog-details-content-para"> <?php echo $data->comment_content ?? ''; ?> </p>
                                </div>
                            </div>

                            <?php $__currentLoopData = $data->reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $repData): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $commented_child_author_image = render_image_markup_by_attachment_id(get_static_option('blog_avater_image'),'','');
                                ?>
                                <ul class="comment-list wow fadeInLeft" data-wow-delay=".2s">
                                    <li>
                                        <div class="blog-details-flex-content">
                                            <div class="blog-details-thumb radius-10">
                                                <?php echo $commented_child_author_image; ?>

                                            </div>
                                            <div class="blog-details-content">
                                                <div class="blog-details-content-flex">
                                                    <div class="blog-details-content-item">
                                                        <h5 class="blog-details-content-title"><a
                                                                href="javascript:void(0)"> <?php echo e(optional($repData->user)->name); ?> </a></h5>
                                                        <span class="blog-details-content-date"> <?php echo e(date('d F Y', strtotime($repData->created_at ?? ''))); ?> </span>
                                                    </div>
                                                </div>
                                                <p class="blog-details-content-para"> <?php echo $repData->comment_content ?? ''; ?> </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

            <?php if(count($blog_comments) > 0): ?>
                <div class="btn-wrapper mt-4">
                    <a href="javascript:void(0)" class="btn-see-more" id="load_more_comment_button"> <?php echo e(__('Load More')); ?> </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/tenant/frontend/partial/blog/blog-all-comments.blade.php ENDPATH**/ ?>