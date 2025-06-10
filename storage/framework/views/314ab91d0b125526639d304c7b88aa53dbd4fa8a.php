<?php
    $current_theme_slug = getSelectedThemeSlug();
    $navbar_area_name = getHeaderNavbarArea();

    $navbar_view = 'themes.'.$current_theme_slug.'.headerNavbarArea.'.$navbar_area_name;
?>

<?php if(View::exists($navbar_view)): ?>
    <?php echo $__env->make($navbar_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('tenant.frontend.partials.pages-portion.navbars.navbar-01', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/navbar.blade.php ENDPATH**/ ?>