<!-- For Mobile nav start -->
<div class="mobile-nav">
    <div class="mobile-nav-item">
        <a href="<?php echo e(route('tenant.shop.cart')); ?>" class="mobile-nav-link">
            <span class="mobile-nav-icon"><i class="las la-shopping-cart"></i></span>
            <span class="mobile-nav-title"><?php echo e(__('Cart')); ?></span>
        </a>
    </div>
    <div class="mobile-nav-item">
        <a href="<?php echo e(route('tenant.shop.compare.product')); ?>" class="mobile-nav-link">
            <span class="mobile-nav-icon"><i class="las la-retweet"></i></span>
            <span class="mobile-nav-title"><?php echo e(__('Compare')); ?></span>
        </a>
    </div>
    <div class="mobile-nav-item">
        <a href="<?php echo e(route('tenant.shop.wishlist.page')); ?>" class="mobile-nav-link">
            <span class="mobile-nav-icon"><i class="las la-shopping-cart"></i></span>
            <span class="mobile-nav-title"><?php echo e(__('Wishlist')); ?></span>
        </a>
    </div>
    <div class="mobile-nav-item">
        <?php
            $route = route('tenant.user.login');
            $name = __('Login');
            if (!empty(Auth::guard('web')->user()))
            {
                $route = route('tenant.user.home');
                $name = __('Dashboard');
            }
        ?>
        <a href="<?php echo e($route); ?>" class="mobile-nav-link">
            <span class="mobile-nav-icon"><i class="las la-user"></i></span>
            <span class="mobile-nav-title"><?php echo e($name); ?></span>
        </a>
    </div>
</div>
<!-- For Mobile nav end -->
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/mobile-footer-menu.blade.php ENDPATH**/ ?>