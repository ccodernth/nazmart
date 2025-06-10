<div class="col-lg-6">
    <div class="global-slick-init shop-details-top-slider" id="shop_details_gallery_slider" data-asNavFor=".shop-details-click-img" data-fade="true"
         data-infinite="true" data-autoplaySpeed="3000" data-autoplay="true">
        <?php
            $image_array = array();
            array_push($image_array, (int)$product->image_id);

            if (count($product->gallery_images) > 0)
            {
                foreach ($product->gallery_images ?? [] as $image)
                {
                    array_push($image_array, $image->id);
                }
            }
        ?>

        <div class="shop-details-thumb-wrapper text-center bg-item-five">
            <div class="shop-details-thums long-img" data-src="<?php echo e(get_attachment_image_by_id($product->image_id)["img_url"] ?? ""); ?>">
                <?php echo render_image_markup_by_attachment_id($product->image_id, 'rounded'); ?>

            </div>
        </div>
    </div>

    <div class="shop-details-bottom-slider-area mt-4" style="position: relative;z-index: -1;">
        <div class="global-slick-init shop-details-click-img dot-style-one banner-dots dot-absolute slider-inner-margin"
             data-focusOnSelect="true" data-infinite="true"
             data-swipeToslide="true" data-slidesToShow="5" data-dots="false"
             data-autoplaySpeed="3000" data-autoplay="true"
             data-responsive='[{"breakpoint": 1600,"settings": {"slidesToShow": 4}},{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3,"arrows": false,"dots": false}},{"breakpoint": 992,"settings": {"slidesToShow": 5,"arrows": false,"dots": false}},{"breakpoint": 768,"settings": {"slidesToShow": 4} },{"breakpoint": 576,"settings": {"slidesToShow": 4} },{"breakpoint": 480,"settings": {"slidesToShow": 3} }]'>
            <?php $__currentLoopData = $image_array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageId): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $image = get_attachment_image_by_id($imageId);
                    $image_path = $image['img_url'];
                ?>
                <div class="shop-small-thumb-wrapper">
                    <div class="small-img shop-details-thums bg-image details-small-product rounded"
                        <?php echo render_background_image_markup_by_attachment_id($imageId); ?>

                        data-image-path="<?php echo e($image_path); ?>">
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/aromatic/frontend/shop/product_details/partials/product-images-slider.blade.php ENDPATH**/ ?>