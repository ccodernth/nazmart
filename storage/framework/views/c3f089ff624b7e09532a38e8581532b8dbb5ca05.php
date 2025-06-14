<footer class="footer-area section-bg-1">
    <div class="footer-top footer-middle-border padding-top-35 padding-bottom-70">
        <div class="container">
            <div class="row justify-content-between">
                <?php echo render_frontend_sidebar('footer',['column' => true]); ?>

            </div>
        </div>
    </div>
    <div class="copyright-area copyright-bg">
        <div class="container container-three">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="copyright-contents center-text">
                        <span> <?php echo get_footer_copyright_text(); ?> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="back-to-top">
    <span class="back-top"> <i class="las la-angle-up"></i> </span>
</div>

<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery-3.6.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery-migrate-3.4.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery.lazy.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/common/js/axios.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/common/js/toastr.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/odometer.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/wow.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/viewport.jquery.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery.syotimer.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery.nice-select.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/jquery.nicescroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/nouislider-8.5.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/landlord/frontend/js/main.js')); ?>"></script>

<?php echo $__env->make('landlord.frontend.partials.gdpr-cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $.ajaxSetup({
        headers: {
            'X-XSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.lang-change-landlord','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.lang-change-landlord'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.landlord-newsletter-store','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.landlord-newsletter-store'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.lazy-load-image','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.lazy-load-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<script>
    $(function () {
        var ENDPOINT = window.location.href;
        var posts = 6;

        $(document).on('click', '#load_more', function (e) {
            e.preventDefault();
            var el = $(this);
            var category = el.data('category');
            var order = el.data('order');
            var order_by = el.data('order_by');

            posts += 6;
            LoadMore(posts, category, order, order_by);
        });

        function LoadMore(posts, category, order, order_by) {
            $.ajax({
                url: '<?php echo e(route('landlord.frontend.blog.load_more.ajax')); ?>',
                type: "get",
                data: {
                    'posts': posts,
                    'category': category,
                    'order': order,
                    'order_by': order_by
                },
                beforeSend: function () {
                    $('#load_more').text('Loading..');
                },
                success: function (response) {
                    if (response != '') {
                        let load_more_items = $("#load-more-items");
                        load_more_items.css('display', 'none');
                        load_more_items.fadeIn(1000);
                        load_more_items.append(response);

                        $('#load_more').text('Load More');
                    } else {
                        $('#load_more').text('No More Blog Available');
                    }
                },
                error: function (jqXHR, ajaxOptions, thrownError) {

                }
            });
        }
    });
</script>

<script>
    if (window.top != window.self) {
        document.body.innerHTML += '<div class="external-website">' +
            '<p class="external-website-para">You are using this website under an external iframe!!</p>' +
            '<p  class="external-website-para mt-3">for a better experience, please browse directly instead of an external iframe.</p>' +
            '<a href="' + window.self.location + '" target="_blank" class="external-website-btn mt-3">Browse Directly</a>' +
            '</div>';
    }
</script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <?php
        $dynamic_script = 'assets/landlord/frontend/js/dynamic-script.js';
    ?>
    <?php if(file_exists($dynamic_script)): ?>
        <script src="<?php echo e(asset($dynamic_script)); ?>"></script>
    <?php endif; ?>

    <?php echo renderBodyEndHooks(); ?>

</body>
</html>
<?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/partials/footer.blade.php ENDPATH**/ ?>