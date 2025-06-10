<?php
    $post_img = null;
?>

<?php $__env->startSection('title'); ?>
    <?php echo e($blog_post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($blog_post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('meta-data'); ?>
    <?php echo render_page_meta_data($blog_post); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="shop-area padding-top-100 padding-bottom-50">
        <div class="container-one">
            <div class="shop-contents-wrapper">

                <!-- Blog Sidebar area starts -->
                <?php echo $__env->make('blog::tenant.frontend.partial.blog.blog-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Blog Sidebar area ends -->

                <div class="shop-grid-contents">
                    <div class="blog-details-wrapper">
                        <div class="single-blog-details">
                            <div class="single-blog-details-content pt-0">
                                <h2 class="single-blog-details-content-title fw-500"> <?php echo e(purify_html($blog_post->title)); ?> </h2>
                                <div class="single-blog-details-content-tags mt-3">
                                    <span class="single-blog-details-content-tags-item">
                                        <a href="<?php echo e(route('tenant.frontend.blog.category', $blog_post->category?->id, $blog_post->category?->slug)); ?>"> <?php echo e($blog_post->category?->title); ?> </a>
                                    </span>
                                    <span class="single-blog-details-content-tags-item"> <?php echo e($blog_post->created_at?->format('d M Y')); ?> </span>
                                </div>
                                <div class="single-blog-details-thumb mt-4">
                                    <?php echo render_image_markup_by_attachment_id($blog_post->image, 'radius-5', 'full', false); ?>

                                </div>
                                <p class="single-blog-details-content-para mt-4"> <?php echo $blog_post->blog_content; ?> </p>
                            </div>
                        </div>
                        <!-- Details Tag area starts -->
                        <div class="details-tag-area color-two padding-top-25 padding-bottom-50">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mt-4">
                                    <div class="blog-details-share-content">
                                        <h4 class="blog-details-share-content-title"> <?php echo e(__('Share:')); ?> </h4>
                                        <ul class="blog-details-share-social">
                                            <?php echo single_post_share(route('tenant.frontend.blog.single', $blog_post->title),$blog_post->title,$post_img); ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <?php if(!empty($blog_post->tags)): ?>
                                        <div class="blog-details-share-content right-align">
                                            <h4 class="blog-details-share-content-title"> <?php echo e(__('Tags:')); ?> </h4>
                                            <ul class="blog-details-tag">
                                                <?php
                                                    $all_tags = explode(',', $blog_post->tags);
                                                ?>
                                                <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $slug = Str::slug($tag);
                                                    ?>
                                                    <?php if(!empty($slug)): ?>
                                                        <li class="blog-details-tag-list">
                                                            <a class="blog-details-tag-list-item text-capitalize" href="<?php echo e(route(route_prefix().'frontend.blog.tags.page',['any' => $slug])); ?>"><?php echo e($tag); ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Details Tag area end -->

                        <!-- Comment area Starts -->
                        <?php echo $__env->make('blog::tenant.frontend.partial.blog.blog-all-comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Comment area ends -->

                        <?php if(Auth::guard('web')->check()): ?>
                        <!-- Post Comment area Starts -->
                        <?php echo $__env->make('blog::tenant.frontend.partial.blog.blog-comment-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Post Comment area ends -->
                        <?php else: ?>
                            <div class="details-comment-content">
                                <div class="sign-in register">
                                    <h4 class="title"><?php echo e(__('Sign In To Leave Your Comment')); ?></h4>
                                    <div class="form-wrapper">
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.error-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('error-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <form action="" method="post" enctype="multipart/form-data" class="account-form" id="login_form_order_page">
                                            <div class="error-wrap"></div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo e(__('Username')); ?><span class="required">*</span></label>
                                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Type your username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1"><?php echo e(__('Password')); ?><span class="required">*</span></label>
                                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                            </div>

                                            <div class="form-group form-check">
                                                <div class="box-wrap">
                                                    <div class="left">
                                                        <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                                                        <label class="form-check-label" for="exampleCheck1"><?php echo e(__('Remember me')); ?></label>
                                                    </div>
                                                    <div class="right">
                                                        <a href="<?php echo e(route('tenant.user.forget.password')); ?>"><?php echo e(__('Forgot Password?')); ?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="btn-wrapper">
                                                <button type="submit" id="login_btn" class="btn-default rounded-btn"><?php echo e(__('Sign In')); ?></button>
                                            </div>

                                        </form>
                                        <p class="info"><?php echo e(__("Don'/t have an account")); ?> <a href="<?php echo e(route('tenant.user.register')); ?>" class="active"><?php echo e(__('Sign up')); ?></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop area end -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        (function($){
            "use strict";

            $(document).ready(function(){


                //Blog Comment Insert
                $(document).on('click', '#submitComment', function (e) {
                    e.preventDefault();

                    var erContainer = $(".error-message");
                    var el = $(this);
                    var form = $('#blog-comment-form');
                    var user_id = $('#user_id').val();
                    var blog_id = $('#blog_id').val();
                    var commented_by = $('#commented_by').val();
                    var comment_content = $('#comment_content').val();
                    let comment_id = $('#blog-comment-form input[name=comment_id]').val();

                    el.text('<?php echo e(__('Submitting')); ?>...');

                    $.ajax({
                        url: form.attr('action'),
                        method: 'POST',
                        data: {
                            _token: "<?php echo e(csrf_token()); ?>",
                            user_id: user_id,
                            blog_id: blog_id,
                            commented_by: commented_by,
                            comment_id: comment_id,
                            comment_content: comment_content,
                        },
                        success: function (data){
                            $('#comment_content').val('');
                            erContainer.html('<div class="alert alert- '+data.msg+'"></div>');
                            load_comment_data('<?php echo e($blog_post->id); ?>');
                            $('#blog-comment-form input[name=comment_id]').val('');
                            location.reload();
                        },
                        error: function (data) {
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function (index, value) {
                                erContainer.find('.alert.alert-danger').append('<p>' + value + '</p>');
                            });
                            el.text('<?php echo e(__('Comment')); ?>');
                        },

                    });
                });

                //Blog Replay
                $(document).on('click', '.btn-replay', function (e) {
                    e.preventDefault();
                    $(this).css({'backgroundColor': 'transparent', 'color': 'var(--main-color-one)'});
                    let comment_id = $(this).data('comment_id');
                    let parent_name = $(this).parent().parent().find('.title').data('parent_name');

                    $('#blog-comment-form input[name=comment_id]').val(comment_id);

                    $('#comment_content').attr('placeholder','Replying to '+ parent_name + '..');

                    $('html').animate({
                        scrollTop: $("#comment_content").offset().top-500
                    },100,'linear');
                });

                function load_comment_data(id) {
                    var commentData = $('#comment_data');
                    var items = commentData.attr('data-items');
                    $.ajax({
                        url: "<?php echo e(route(route_prefix().'frontend.load.blog.comment.data')); ?>",
                        method: "POST",
                        data: {id: id, _token: "<?php echo e(csrf_token()); ?>", items: items},
                        success: function (data) {

                            commentData.attr('data-items',parseInt(items) + 5);

                            $('#comment_data').append(data.markup);
                            $('#load_more_comment_button').text('<?php echo e(__('Load More')); ?>');


                            if (data.blogComments.length === 0) {
                                $('#load_more_comment_button').text('<?php echo e(__('No More Comment Found')); ?>');

                                setTimeout(function (){
                                    $('#load_more_comment_button').text('<?php echo e(__('Load More')); ?>');
                                }, 2000)
                            }
                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $(this).text('<?php echo e(__('Loading...')); ?>');
                    load_comment_data('<?php echo e($blog_post->id); ?>');
                });

            });
        })(jQuery);
    </script>












    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.ajax-login','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.ajax-login'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/tenant/frontend/blog/blog-single.blade.php ENDPATH**/ ?>