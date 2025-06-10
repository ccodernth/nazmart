<?php
    $current_theme_slug = getSelectedThemeSlug();
    $widget_area_name = getFooterWidgetArea();

    $footer_view = 'themes.'.$current_theme_slug.'.footerWidgetArea.'.$widget_area_name;
?>

<?php if(View::exists($footer_view)): ?>
    <?php echo $__env->make($footer_view, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php else: ?>
    <?php echo $__env->make('tenant.frontend.partials.pages-portion.footers.footer-medicom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/widget-area.blade.php ENDPATH**/ ?>