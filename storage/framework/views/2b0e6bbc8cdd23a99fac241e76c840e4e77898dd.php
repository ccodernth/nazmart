<?php
    $userlang = get_user_lang();
?>

<div class="map-area" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="contact_map">
                   <?php echo $data['location']; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/contact/google-map.blade.php ENDPATH**/ ?>