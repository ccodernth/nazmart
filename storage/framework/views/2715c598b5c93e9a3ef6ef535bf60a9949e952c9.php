<?php
    if(!isset($page_post)){
        return;
    }
?>

<?php echo \Plugins\PageBuilder\PageBuilderSetup::render_frontend_pagebuilder_content_for_dynamic_page('dynamic_page',$page_post->id); ?>

<?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/partials/pages-portion/dynamic-page-builder-part.blade.php ENDPATH**/ ?>