<div class="modal fade" id="<?php echo e($target); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e($title); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo e($slot); ?>

            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/components/modal/markup.blade.php ENDPATH**/ ?>