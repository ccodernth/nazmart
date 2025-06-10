<div class="shop-icon">
    <div class="sidebar-icon">
        <i class="las la-bars"></i>
    </div>
</div>
<div class="shop-sidebar-content">
    <div class="shop-close-main">
        <div class="close-bars"> <i class="las la-times"></i> </div>
        <div class="single-shop-left">
            <div class="single-shop-left-search">
                <div class="single-shop-left-search-input">
                    <form action="<?php echo e(route('tenant.frontend.blog.search.page')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="text" class="form--control" name="search" placeholder="<?php echo e(__('Search Products')); ?>">
                        <button type="submit"> <i class="las la-search"></i> </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Category')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="category-lists active-list">
                        <?php $__currentLoopData = $all_category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list <?php echo e(isset($blog_post) == true ? ($blog_post->category_id == $category->id ? 'active' : '') : ''); ?>">
                                <a href="<?php echo e(route('tenant.frontend.blog.category', $category->slug)); ?>" class="item">
                                    <span class="ad-values"> <?php echo e($category->title); ?> </span>
                                    <span> <?php echo e($category->blogs_count); ?> </span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-left-title open">
                <h5 class="title title-borders fw-500"> <?php echo e(__('Tags')); ?> </h5>
                <div class="shop-left-list margin-top-15">
                    <ul class="tag-lists active-list">
                        <?php $__currentLoopData = $all_tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list">
                                <a class="radius-0" href="<?php echo e(tenant_blog_tag_route(Str::slug($tag->slug))); ?>"> <?php echo e($tag->title); ?> </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="single-shop-left mt-5">
            <div class="shop-advertisesdfs">
                <?php echo render_frontend_sidebar('blog_sidebar',['column' => false]); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/Modules/Blog/Resources/views/tenant/frontend/partial/blog/blog-sidebar.blade.php ENDPATH**/ ?>