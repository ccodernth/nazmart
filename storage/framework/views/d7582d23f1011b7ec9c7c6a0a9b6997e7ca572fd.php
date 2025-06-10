<?php
    $post_img = null;
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($blog_post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <?php echo e($blog_post->title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <section class="blog-details-area section-bg-1 padding-top-95">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-wrapper">
                        <div class="single-blog-details">
                            <div class="single-blog-details-thumb blurred-img" <?php echo render_preloaded_image($blog_post->image); ?>>
                                <?php echo render_image_markup_by_attachment_id($blog_post->image, '', 'full', false, is_lazy: true); ?>

                            </div>
                            <div class="single-blog-details-content">
                                <h2 class="single-blog-details-content-title"> <?php echo e($blog_post->title); ?> </h2>
                                <div class="single-blog-details-content-tags mt-3">
                                    <span class="single-blog-details-content-tags-item">
                                        <a href="<?php echo e(route(route_prefix().'frontend.blog.category',['id' => optional($blog_post->category)->id,'any'=> Str::slug(optional($blog_post->category)->title)])); ?>"> <?php echo e(optional($blog_post->category)->title); ?> </a>
                                    </span>
                                    <span
                                        class="single-blog-details-content-tags-item"> <?php echo e($blog_post->created_at->diffForHumans()); ?> </span>
                                </div>
                                <p class="single-blog-details-content-para mt-4"> <?php echo $blog_post->blog_content; ?> </p>
                            </div>
                        </div>

                        <!-- Details Tag area starts -->
                        <div class="details-tag-area padding-top-35 padding-bottom-60">
                            <div class="row align-items-center">
                                <div class="col-lg-6 mt-4">
                                    <div class="blog-details-share-content">
                                        <h4 class="blog-details-share-content-title"> <?php echo e(__('Share:')); ?> </h4>
                                        <ul class="blog-details-share-social">
                                            <?php echo single_post_share(route(route_prefix().'frontend.blog.single', $blog_post->slug),$blog_post->title,$post_img); ?>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-4">
                                    <div class="blog-details-share-content right-align">
                                        <?php if($blog_post->tags != null): ?>
                                            <h4 class="blog-details-share-content-title"> <?php echo e(__('Tags:')); ?> </h4>
                                            <ul class="blog-details-tag">
                                                    <?php
                                                        $all_tags = explode(',',$blog_post->tags);
                                                    ?>
                                                    <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $slug = Str::slug($tag);
                                                        ?>
                                                        <?php if(!empty($slug)): ?>
                                                            <li class="blog-details-tag-list">
                                                                <a class="blog-details-tag-list-item"
                                                                   href="<?php echo e(route(route_prefix().'frontend.blog.tags.page',['any' => $slug])); ?>"> <?php echo e($tag); ?> </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Details Tag area end -->

                        <!-- Comment Show Area Start-->
                        <?php echo $__env->make('blog::landlord.frontend.partial.blog.comment-show-data', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <!-- Comment Show Area End-->

                        <!-- Post Comment area Starts -->
                        <div class="comment-area padding-top-60 padding-bottom-60">
                            <h3 class="details-section-title"> <?php echo e(__('Post Your Comment')); ?> </h3>
                            <div class="error-message"></div>
                            <div class="row">
                                <div class="col-lg-6 padding-top-40">
                                    <?php
                                        $user = Auth::guard('web')->user();
                                    ?>

                                    <?php if(!empty($user)): ?>
                                        <?php echo $__env->make('blog::landlord.frontend.partial.blog.comment-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php else: ?>
                                        <?php if(Auth::guard('admin')->user() == null): ?>
                                            <div class="details-comment-content">
                                            <div class="sign-in register signIn-signUp-wrapper">
                                                <h4 class="title signin-contents-title"><?php echo e(__('Sign In')); ?></h4>
                                                <div class="form-wrapper custom-form mt-4">
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
                                                        <div class="form-group mt-4">
                                                            <label for="exampleInputEmail1" class="label-title"><?php echo e(__('Username')); ?><span class="required">*</span></label>
                                                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="<?php echo e(__('Type your username')); ?>">
                                                        </div>
                                                        <div class="form-group mt-4">
                                                            <label for="exampleInputEmail1" class="label-title"><?php echo e(__('Password')); ?><span class="required">*</span></label>
                                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="<?php echo e(__('Password')); ?>">
                                                        </div>

                                                        <div class="form-group single-input form-check mt-4">
                                                            <div class="box-wrap">
                                                                <div class="left">
                                                                    <div class="checkbox-inlines">
                                                                        <input type="checkbox" name="remember" class="form-check-input check-input" id="exampleCheck1">
                                                                        <label class="form-check-label checkbox-label" for="exampleCheck1"><?php echo e(__('Remember me')); ?></label>
                                                                    </div>
                                                                </div>
                                                                <div class="right forgot-password">
                                                                    <a href="<?php echo e(route('tenant.user.forget.password')); ?>" class="forgot-btn"><?php echo e(__('Forgot Password?')); ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="btn-wrapper mt-4">
                                                            <button type="submit" id="login_btn" class="btn-default submit-btn"><?php echo e(__('Sign In')); ?></button>
                                                        </div>

                                                    </form>
                                                    <p class="info mt-3"><?php echo e(__("Don'/t have an account")); ?> <a href="<?php echo e(route('tenant.user.register')); ?>" class="active"><strong><?php echo e(__('Sign up')); ?></strong></a></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Post Comment area ends -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="getupdate-area section-bg-1 padding-top-50 padding-bottom-50">
        <div class="container">
            <div class="getupdate-wrapper getupdate-bg radius-20">
                <div class="getupdate-shape">
                    <img src="<?php echo e(asset('assets/img/getupdate-line.png')); ?>" alt="">
                </div>
                <div class="getupdate-content center-text">
                    <h2 class="getupdate-content-title"> <?php echo e(__('Get Updates as soon as they happen.')); ?></h2>
                    <p class="getupdate-content-para mt-4"> <?php echo e(__('Signup now for our newsletter and app launch.')); ?> </p>
                    <form action="" class="getupdate-content-form mt-4" id="landlord-newsletter-form">
                        <div class="getupdate-content-form-single radius-5">
                            <input type="email" class="getupdate-content-form-single-input radius-5" name="email"
                                   placeholder="<?php echo e(__('Your Email Here')); ?>">
                            <button type="submit"> <?php echo e(__('Sign Up')); ?> </button>
                        </div>
                    </form>
                    <div class="form-message-show mt-4"></div>
                </div>
            </div>
        </div>
    </section>
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
                            erContainer.html('<div class="mt-3 mb-0 alert alert-'+data.type+'">'+data.msg+'</div>');


                            if (comment_id != '')
                            {
                                location.reload();
                            } else {
                                load_comment_data('<?php echo e($blog_post->id); ?>', 'load-one');

                                $('#blog-comment-form input[name=comment_id]').val('');
                                $('#comment_content').attr('placeholder','Post Comments');
                            }

                            el.text('<?php echo e(__('Comment')); ?>');
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
                    let el = $(this);

                    let comment_id = el.data('comment_id');
                    let parent_name = el.siblings('div').children('.blog-details-content-title').find('a').data('parent_name');

                    $('#blog-comment-form input[name=comment_id]').val(comment_id);
                    $('#comment_content').attr('placeholder','Replying to '+ parent_name + '..');

                    $('html').animate({
                        scrollTop: $("#comment_content").offset().top-500
                    },100,'linear');
                });

                function load_comment_data(id, type) {
                    var commentData = $('#comment_data');
                    var items = commentData.attr('data-items');

                    $.ajax({
                        url: "<?php echo e(route(route_prefix().'frontend.load.blog.comment.data')); ?>",
                        method: "POST",
                        data: {id: id, _token: "<?php echo e(csrf_token()); ?>", items: items, type: type},
                        success: function (data) {

                            commentData.attr('data-items',parseInt(items) + 5);

                            commentData.find('ul').append(data.markup);
                            $('#load_more_comment_button').text('<?php echo e(__('Load More')); ?>');


                            if (data.blogComments.length === 0) {
                                $('#load_more_comment_button').text('<?php echo e(__('No More Comment Found')); ?>');
                            }

                        }
                    })
                }

                $(document).on('click', '#load_more_comment_button', function () {
                    $(this).text('<?php echo e(__('Loading...')); ?>');
                    load_comment_data('<?php echo e($blog_post->id); ?>', 'load-more');
                });

            });
        })(jQuery);

        // When the user scrolls the page, execute myFunction
        window.onscroll = function () {
            myFunction()
        };

        function myFunction() {
            var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            var scrolled = (winScroll / height) * 100;
            document.getElementById("myBar").style.width = scrolled + "%";
        }
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

<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/landlord/frontend/blog/blog-single.blade.php ENDPATH**/ ?>