<meta name ="author" content= "<?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?>" />
<meta name ="tags" content= "<?php echo e(filter_static_option_value('site_meta_tags',$global_static_field_data)); ?>" />
<meta name ="keywords" content= "<?php echo e(filter_static_option_value('site_meta_keywords',$global_static_field_data)); ?>" />
<meta name ="description" content= "<?php echo e(filter_static_option_value('site_meta_description',$global_static_field_data)); ?>." />



<meta property="og:type" content="article" />

<meta property="og:title" content="<?php echo e(filter_static_option_value('site_og_meta_title',$global_static_field_data)); ?>" />

<meta property="og:description" content="<?php echo e(filter_static_option_value('site_og_meta_description',$global_static_field_data)); ?>" />
<?php
    $image_url = '';
    $image_details = get_attachment_image_by_id(filter_static_option_value('site_og_meta_image',$global_static_field_data));
    if (isset($image_details['img_url'])){
        $image_url = $image_details['img_url'];
    }
?>
<meta property="og:image" content="<?php echo e($image_url); ?>" />

<meta property="og:url" content="<?php echo e(\Illuminate\Support\Facades\URL::current()); ?>" />

<meta property="og:site_name" content="<?php echo e(filter_static_option_value('site_title',$global_static_field_data)); ?>" />



<meta name="twitter:title" content="<?php echo e(filter_static_option_value('site_og_meta_title',$global_static_field_data)); ?>">

<meta name="twitter:description" content="<?php echo e(filter_static_option_value('site_og_meta_description',$global_static_field_data)); ?>">

<meta name="twitter:image" content="<?php echo e($image_url); ?>">
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/meta-data.blade.php ENDPATH**/ ?>