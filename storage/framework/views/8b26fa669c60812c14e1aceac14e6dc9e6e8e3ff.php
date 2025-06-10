








<div class="product-categories-main-div-vitrin2" data-padding-top="<?php echo e($data['padding_top'] ?? '0'); ?>" data-padding-bottom="<?php echo e($data['padding_bottom'] ?? '0'); ?>">
    <div class="product-categories-inside-vitrin2">
        <!-- Modül başlığı ve üst başlığı -->
        <div class="modules-head-text-main">
            <div class="modules-head-forbg-text-out" style="border-bottom: 1px solid #cccccc;">
                <div class="modules-head-forbg-text" style="color: #000000; background-color: #ffffff;">
                    <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''); ?>

                </div>
            </div>
            <div class="modules-head-text-s" style="color: #999292; margin-bottom: 0;">
                <?php echo e(\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''); ?>

            </div>
        </div>
        <!-- Modül başlığı ve üst başlığı SON -->

        <div class="product-categories-inside-vitrin2-boxarea">
            <!-- Sabit 8 Görsel ve URL -->
            <?php
                $colClass = ['col-md-4', 'col-md-4', 'col-md-4', 'col-md-12', 'col-md-3', 'col-md-3', 'col-md-3', 'col-md-3'];
            ?>

            <?php for($i = 0; $i < 8; $i++): ?>
                <?php
                    $colIndex = $i % count($colClass);
                    $figure_image = $data['image_data'][$i]['image'] ?? '';
                    $image = get_attachment_image_by_id($figure_image);
                    $image_shape = $image != null ? $image['img_url'] : '';
                    $url = $data['image_data'][$i]['url'] ?? 'javascript:void(0)';
                    $altText = "Image " . ($i + 1);
                ?>

                <a class="<?php echo e($colClass[$colIndex]); ?> form-group vitrin2-box vitrin2-link" href="<?php echo e($url); ?>" >
                    <div class="vitrin2-box-img rounded">
                        <img class="lazy" src="<?php echo e($image_shape); ?>" alt="<?php echo e($altText); ?>">
                    </div>
                </a>
            <?php endfor; ?>
            <!--  <========SON=========>>> Box SON -->
        </div>
    </div>
</div>

<!-- CSS kısmında "vitrin2-link" sınıfını tanımlayarak stil özelliklerini buraya taşıyabilirsiniz -->






<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/tenant/fruit/common/collection_card.blade.php ENDPATH**/ ?>