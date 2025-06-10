
<section class="dynamic-page-content-area" data-padding-top="100" data-padding-bottom="70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <?php if( $page_post->visibility === 1): ?>
                    <?php if(auth('web')->check()): ?>
                    <div class="dynamic-page-content-wrap">
                        <?php echo $page_post->page_content; ?>

                    </div>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <p><a class="text-primary" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a> <?php echo e(__('to see this page')); ?> </p>
                        </div>
                    <?php endif; ?>
             <?php else: ?>
                    <div class="dynamic-page-content-wrap">
                        <?php echo $page_post->page_content; ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/partials/dynamic-content.blade.php ENDPATH**/ ?>