<div class="search-wrap">
    <div class="form-group">
        <input type="text" class="form-control" id="search_addon_field" placeholder="<?php echo e(__('Search Addon')); ?>" name="s">
    </div>
</div>
<div class="all-addons-wrapper">
    <ul id="sortable_02" class="available-form-field all-widgets sortable_02">
        <?php if(isset($type) && $type === 'tenant'): ?>

            <?php echo \Plugins\PageBuilder\PageBuilderSetup::get_tenant_admin_panel_widgets($language->slug); ?>

        <?php else: ?>
            <?php echo \Plugins\PageBuilder\PageBuilderSetup::get_admin_panel_widgets($language->slug); ?>

        <?php endif; ?>
    </ul>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/components/widgets.blade.php ENDPATH**/ ?>