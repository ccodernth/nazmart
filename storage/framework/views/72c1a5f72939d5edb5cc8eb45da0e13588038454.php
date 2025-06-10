<!-- new product modal - start -->
<div class="modal product-quick-view-bg-color" id="product_quick_view" tabindex="-1" role="dialog"
     aria-labelledby="productModal"
     aria-hidden="true">
</div>

<!-- footer area start -->
<?php echo $__env->make('tenant.frontend.partials.widget-area', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer area end -->

<!-- For Mobile nav start -->
<?php echo $__env->make('tenant.frontend.partials.mobile-footer-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- For Mobile nav end -->

<!-- back to top area start -->
<?php echo $__env->make('tenant.frontend.partials.backtop', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- back to top area end -->

<?php
    $theme_footer_css_files = \App\Facades\ThemeDataFacade::getFooterHookCssFiles();
?>
<?php $__currentLoopData = $theme_footer_css_files ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cssFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <link rel="stylesheet" href="<?php echo e(loadCss($cssFile)); ?>" type="text/css"/>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php
    $loadCoreScript = loadCoreScript();
?>

<?php if(in_array('jquery-3.6.1.min', $loadCoreScript)): ?>
    <!-- jquery -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery-3.6.1.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('jquery-migrate-3.4.0.min', $loadCoreScript)): ?>
    <!-- jquery Migrate -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery-migrate-3.4.0.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('bootstrap.bundle.min', $loadCoreScript)): ?>
    <!-- bootstrap -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/bootstrap.bundle.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('jquery.lazy.min', $loadCoreScript)): ?>
    <!-- Lazyload Js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery.lazy.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('slick', $loadCoreScript)): ?>
    <!-- Slick Slider -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/slick.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('odometer', $loadCoreScript)): ?>
    <!-- Odometer js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/odometer.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('viewport.jquery', $loadCoreScript)): ?>
    <!-- Viewport js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/viewport.jquery.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('wow', $loadCoreScript)): ?>
    <!-- All Plugins js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/wow.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('jquery.nice-select', $loadCoreScript)): ?>
    <!-- Nice Select Js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery.nice-select.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('jquery.syotimer.min', $loadCoreScript)): ?>
    <!-- COuntdown Js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery.syotimer.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('sweetalert2', $loadCoreScript)): ?>
    <!-- Sweet Alert -->
    <script src="<?php echo e(global_asset('assets/landlord/common/js/sweetalert2.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('toastr.min', $loadCoreScript)): ?>
    <!-- Toastr -->
    <script src="<?php echo e(global_asset('assets/common/js/toastr.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('jquery.nicescroll.min', $loadCoreScript)): ?>
    <!-- Nice Scroll -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/jquery.nicescroll.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('nouislider-8.5.1.min', $loadCoreScript)): ?>
    <!-- Range Slider -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/nouislider-8.5.1.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('custom-alert-message', $loadCoreScript)): ?>
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/custom-alert-message.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('main', $loadCoreScript)): ?>
    <!-- main js -->
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/main.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('star-rating.min', $loadCoreScript)): ?>
    <script src="<?php echo e(global_asset('assets/common/js/star-rating.min.js')); ?>"></script>
<?php endif; ?>

<?php if(in_array('md5', $loadCoreScript)): ?>
    <script src="<?php echo e(global_asset('assets/common/js/md5.js')); ?>"></script>
<?php endif; ?>

<script src="<?php echo e(global_asset('assets/common/js/custom-sweetalert-two.js')); ?>"></script>

<?php echo $__env->make('landlord.frontend.partials.gdpr-cookie', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php
    $theme_footer_js_files = \App\Facades\ThemeDataFacade::getFooterHookJsFiles();
?>
<?php $__currentLoopData = $theme_footer_js_files ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jsFile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <script src="<?php echo e(loadJs($jsFile)); ?>"></script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<script src="<?php echo e(global_asset('assets/tenant/frontend/js/digital-shop-common.js')); ?>"></script>

<?php
    $tenant_id = !empty(tenant()) ? tenant()->id : '';
    $file = file_exists('assets/tenant/frontend/js/'.$tenant_id.'/dynamic-script.js');
?>
<?php if($file): ?>
    <script src="<?php echo e(global_asset('assets/tenant/frontend/js/'.$tenant_id.'/dynamic-script.js')); ?>"></script>
<?php endif; ?>

<?php echo \App\Facades\ThemeDataFacade::renderFooterHookBladeFile(); ?>


<script>
    let site_currency_symbol = '<?php echo e(site_currency_symbol()); ?>';

    <?php if(in_array(tenant()->theme_slug, ["hexfashion","furnito","aromatic","electro"])): ?>
    $('.theme-one-footer .col-lg-3').removeClass('col-lg-3').addClass('col-lg-4');
    $('.theme-two-footer .col-lg-3').removeClass('col-lg-3').addClass('col-lg-4');
    $('.theme-aromatic-footer .col-lg-3').removeClass('col-lg-3').addClass('col-lg-4');
    $('.theme-electro-footer .footer-top-contents .col-lg-3').removeClass('col-lg-3').addClass('col-lg-4');
    <?php endif; ?>
</script>

<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.newsletter-store','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.newsletter-store'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.contact-form-store','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.contact-form-store'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.lang-change','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.lang-change'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.tenant-addon-custom-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('tenant-addon-custom-js'); ?>
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
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "2000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "slideDown",
        "hideMethod": "slideUp"
    };

    $(function () {
        $(document).on('keyup', '#search_form_input', function (e) {
            e.preventDefault();

            let search_text = $(this).val();

            $.ajax({
                url: '<?php echo e(route("tenant.search.ajax")); ?>',
                type: 'GET',
                data: {
                    search: search_text
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.product_object.length > 0) {
                        $('.product-suggestion-list').html(data.markup);
                    }
                }
            });
        });

        // Compare Product
        $(document).on('click', '.quick-view-compare-btn', function (e) {
            e.preventDefault();

            let quick_view_has_campaign = '<?php echo e(empty($campaign_product) ? 0 : 1); ?>';
            let quick_view_campaign_expired = '<?php echo e(isset($is_expired) ? $is_expired : 0); ?>';

            if (quick_view_has_campaign === 1) {
                if (quick_view_campaign_expired === 0) {
                    toastr.error('The campaign is over, Sorry! you can not cart this product');
                    return false;
                }
            }

            let selected_size = $('#selected_size').val();
            let selected_color = $('#selected_color').val();

            let pid_id = getQuickViewAttributesForCart();

            let product_id = quick_view_product_id;
            let quantity = Number($('#quick-view-quantity').val().trim());
            let price = $('#price').text().split(site_currency_symbol)[1];
            let attributes = {};
            let product_variant = pid_id;
            let productAttribute = quick_view_selected_variant;

            attributes['price'] = price;

            // if selected attribute is a valid product item
            if (quickViewValidateSelectedAttributes()) {
                $.ajax({
                    url: '<?php echo e(route("tenant.shop.product.add.to.compare.ajax")); ?>',
                    type: 'POST',
                    data: {
                        product_id: product_id,
                        quantity: quantity,
                        pid_id: pid_id,
                        product_variant: product_variant,
                        selected_size: selected_size,
                        selected_color: selected_color,
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        if (data.quantity_msg) {
                            toastr.warning(data.quantity_msg);
                        } else if (data.error_msg) {
                            toastr.error(data.error_msg);
                        } else {
                            toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                            $('.track-icon-list').load(location.href + " .track-icon-list");
                        }
                    },
                    error: function (err) {
                        toastr.error('<?php echo e(__("An error occurred")); ?>')
                    }
                });
            } else {
                toastr.error('<?php echo e(__("Select all attribute to proceed")); ?>')
            }
        });


        $(document).on('click', '.compare-btn', function (e) {
            e.preventDefault();

            let pid_id = null;
            let product_id = $(this).data("product_id");
            let quantity = 1;
            let product_variant = null;

            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.compare.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: null,
                    selected_color: null,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        $('.track-icon-list').load(location.href + " .track-icon-list");
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });

        });

        $(document).on('click', '.add-to-wishlist-btn', function (e) {
            e.preventDefault();

            let pid_id = null;
            let product_id = $(this).data("product_id");
            let quantity = 1;
            let product_variant = null;

            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.wishlist.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: null,
                    selected_color: null,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        $('.track-icon-list').load(location.href + " .track-icon-list");
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });

        });

        $(document).on('click', '.add-to-cart-btn', function (e) {
            e.preventDefault();

            let pid_id = null;
            let product_id = $(this).data("product_id");
            let quantity = 1;
            let product_variant = null;

            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.cart.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: null,
                    selected_color: null,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        $('.track-icon-list').load(location.href + " .track-icon-list");
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });

        });

        $(document).on('click', '.digital-add-to-cart-btn', function (e) {
            e.preventDefault();

            let product_id = $(this).data("product_id");

            $.ajax({
                url: '<?php echo e(route("tenant.digital.shop.product.add.to.cart.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        let track_icon_list = $('.track-icon-list');
                        track_icon_list.hide();
                        track_icon_list.load(location.href + " .track-icon-list");
                        track_icon_list.fadeIn();
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });
        });

        function storeIntoSession(product_id) {
            let arrItem = [];

            if (sessionStorage.length === 0) {
                sessionStorage.setItem('products', product_id);
            } else {
                arrItem.push(sessionStorage.getItem('products'));
                arrItem.push(product_id);
                sessionStorage.setItem('products', arrItem);
            }

            return sessionStorage.getItem('products');
        }
    });

    $(document).on('click', '.social_share_parent', function (e) {
        $('.social_share_wrapper_item').toggleClass('show');
    });

    $('body').on('click', '.quick-view-size-lists li', function (event) {
        let el = $(this);
        let value = el.data('displayValue');
        let parentWrap = el.parent().parent();
        el.addClass('active');
        el.siblings().removeClass('active');
        parentWrap.find('input[type=text]').val(value);
        parentWrap.find('input[type=hidden]').val(el.data('value'));

        // selected attributes
        selectedAttributeSearch(this);
    });

    function selectedAttributeSearch(selected_item) {
        /*
        * search based on all selected attributes
        *
        * 1. get all selected attributes in {key:value} format
        * 2. search in attribute_store for all available matches
        * 3. display available matches (keep available matches selectable, and rest as disabled)
        * */

        let available_variant_types = [];
        let selected_options = {};

        $('.quick-view-size-lists li').addClass('disabled');

        // get all selected attributes in {key:value} format
        quick_view_available_options.map(function (k, option) {
            let selected_option = $(option).find('li.active');
            let type = selected_option.closest('.quick-view-size-lists').data('type');
            let value = selected_option.data('displayValue');

            if (type) {
                available_variant_types.push(type);
            }

            if (type && value) {
                selected_options[type] = value;
            }
        });

        quickViewSyncImage(get_quick_view_selected_options());
        quickViewSyncPrice(get_quick_view_selected_options());
        quickViewSyncStock(get_quick_view_selected_options());

        // search in attribute_store for all available matches
        let available_variants_selection = [];
        let selected_attributes_by_type = {};
        quick_view_attribute_store.map(function (arr) {
            let matched = true;

            Object.keys(selected_options).map(function (type) {

                if (arr[type] !== selected_options[type]) {
                    matched = false;
                }
            })

            if (matched) {
                available_variants_selection.push(arr);

                // insert as {key: [value, value...]}
                Object.keys(arr).map(function (type) {
                    // not array available for the given key
                    if (!selected_attributes_by_type[type]) {
                        selected_attributes_by_type[type] = []
                    }

                    // insert value if not inserted yet
                    if (selected_attributes_by_type[type].indexOf(arr[type]) <= -1) {
                        selected_attributes_by_type[type].push(arr[type]);
                    }
                })
            }

            window.quick_view_selected_variant = selected_attributes_by_type;
        });

        // selected item not contain product then de-select all selected option hare
        if (Object.keys(selected_attributes_by_type).length == 0) {
            $('.quick-view-size-lists li.active').each(function () {
                let sizeItem = $(this).parent().parent();

                sizeItem.find('input[type=hidden]').val('');
                sizeItem.find('input[type=text]').val('');
            });

            $('.quick-view-size-lists li.active').removeClass("active");
            $('.quick-view-size-lists li.disabled').removeClass("disabled");

            let el = $(selected_item);
            let value = el.data('displayValue');
            let parentWrap = el.parent().parent();

            el.addClass("active");
            el.siblings().removeClass('active');

            selectedAttributeSearch();

            parentWrap.find('input[type=text]').val(value);
            parentWrap.find('input[type=hidden]').val(el.data('value'));
        }

        // keep only available matches selectable
        Object.keys(selected_attributes_by_type).map(function (type) {
            // initially, disable all buttons
            $('.quick-view-size-lists[data-type="' + type + '"] li').addClass('disabled');

            // make buttons selectable for the available options
            selected_attributes_by_type[type].map(function (value) {
                let available_buttons = $('.quick-view-size-lists[data-type="' + type + '"] li[data-display-value="' + value + '"]');
                available_buttons.map(function (key, el) {
                    $(el).removeClass('disabled');
                })
            })
        });
        // todo check is empty object
        // selected_attributes_by_type
    }

    function quickViewSyncImage(selected_options) {
        //todo fire when attribute changed
        let hashed_key = getQuickViewSelectionHash(selected_options);

        let product_image_el = $('.quick-view-long-img img');

        let img_original_src = product_image_el.parent().data('src');

        // if selection has any image to it
        if (quick_view_additional_info_store[hashed_key]) {
            let attribute_image = quick_view_additional_info_store[hashed_key].image;
            if (attribute_image) {
                product_image_el.attr('src', attribute_image);
            }
        } else {
            product_image_el.attr('src', img_original_src);
        }
    }

    function quickViewSyncPrice(selected_options) {
        let hashed_key = getQuickViewSelectionHash(selected_options);

        let product_price_el = $('#quick-view-price');
        let product_main_price = Number(String(product_price_el.data('mainPrice'))).toFixed(2);
        let site_currency_symbol = product_price_el.data('currencySymbol');

        // if selection has any additional price to it
        if (quick_view_additional_info_store[hashed_key]) {
            let attribute_price = quick_view_additional_info_store[hashed_key]['additional_price'];
            if (attribute_price) {
                let price = Number(product_main_price) + Number(attribute_price);
                product_price_el.text(site_currency_symbol + Number(price).toFixed(2));
            }
        } else {
            product_price_el.text(site_currency_symbol + product_main_price);
        }
    }

    function quickViewSyncStock(selected_options) {
        let hashed_key = getQuickViewSelectionHash(selected_options);
        let product_stock_el = $('#quick_view_stock');
        let product_item_left_el = $('#quick_view_item_left');

        // if selection has any size and color to it

        if (quick_view_additional_info_store[hashed_key]) {
            let stock_count = quick_view_additional_info_store[hashed_key]['stock_count'];

            let stock_message = '';
            if (Number(stock_count) > 0) {
                stock_message = `<span class="text-success"><?php echo e(__('In Stock')); ?></span>`;
                product_item_left_el.text(`Only! ${stock_count} Item Left!`);
                product_item_left_el.addClass('text-success');
                product_item_left_el.removeClass('text-danger');
            } else {
                stock_message = `<span class="text-danger"><?php echo e(__('Our fo Stock')); ?></span>`;
                product_item_left_el.text(`No Item Left!`);
                product_item_left_el.addClass('text-danger');
                product_item_left_el.removeClass('text-success');
            }

            product_stock_el.html(stock_message);
        } else {
            product_stock_el.html(product_stock_el.data("stock-text"))
            product_item_left_el.html(product_item_left_el.data("stock-text"))
        }
    }

    function attributeSelected() {
        let total_options_count = $('.quick-view-size-lists').length;
        let selected_options_count = $('.quick-view-size-lists li.active').length;
        return total_options_count === selected_options_count;
    }

    function addslashes(str) {
        return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
    }

    function getQuickViewSelectionHash(selected_options) {
        return MD5(JSON.stringify(selected_options));
    }

    function get_quick_view_selected_options() {
        let selected_options = {};
        var quick_view_available_options = $('.quick-view-value-input-area');
        // get all selected attributes in {key:value} format
        quick_view_available_options.map(function (k, option) {
            let selected_option = $(option).find('li.active');
            let type = selected_option.closest('.quick-view-size-lists').data('type');
            let value = selected_option.data('displayValue');

            if (type && value) {
                selected_options[type] = value;
            }
        });

        let ordered_data = {};
        let selected_options_keys = Object.keys(selected_options).sort();
        selected_options_keys.map(function (e) {
            ordered_data[e] = selected_options[e];
        });

        return ordered_data;
    }

    function getQuickViewAttributesForCart() {
        let selected_options = get_quick_view_selected_options();
        let cart_selected_options = selected_options;
        let hashed_key = getQuickViewSelectionHash(selected_options);

        // if selected attribute set is available
        if (quick_view_additional_info_store[hashed_key]) {
            return quick_view_additional_info_store[hashed_key]['pid_id'];
        }

        // if selected attribute set is not available
        if (Object.keys(selected_options).length) {
            toastr.error('<?php echo e(__("Attribute not available")); ?>')
        }

        return '';
    }

    function quickViewValidateSelectedAttributes() {
        let selected_options = get_quick_view_selected_options();
        let hashed_key = getQuickViewSelectionHash(selected_options);

        // validate if product has any attribute
        if (quick_view_attribute_store.length) {
            if (!Object.keys(selected_options).length) {
                return false;
            }

            if (!quick_view_additional_info_store[hashed_key]) {
                return false;
            }

            return !!quick_view_additional_info_store[hashed_key]['pid_id'];
        }

        return true;
    }

    $(document).on('click', '.quick_view_add_to_cart', function (e) {
        e.preventDefault();

        let selected_size = $('#selected_size').val();
        let selected_color = $('#selected_color').val();

        let pid_id = getQuickViewAttributesForCart();

        let product_id = quick_view_product_id;
        let quantity = Number($('#quick-view-quantity').val().trim());
        let price = $('#price').text().split(site_currency_symbol)[1];
        let attributes = {};
        let product_variant = pid_id;
        let productAttribute = quick_view_selected_variant;

        attributes['price'] = price;

        // if selected attribute is a valid product item
        if (quickViewValidateSelectedAttributes()) {
            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.cart.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: selected_size,
                    selected_color: selected_color,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        let track_icon_list = $('.track-icon-list');
                        track_icon_list.hide();
                        track_icon_list.load(location.href + " .track-icon-list");
                        track_icon_list.fadeIn();
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });
        } else {
            toastr.error('<?php echo e(__("Select all attribute to proceed")); ?>')
        }
    });

    $(document).on('click', '.quick_view_add_to_wishlist', function (e) {
        e.preventDefault();

        let quick_view_has_campaign = '<?php echo e(empty($campaign_product) ? 0 : 1); ?>';
        let quick_view_campaign_expired = '<?php echo e(isset($is_expired) ? $is_expired : 0); ?>';

        if (quick_view_has_campaign === 1) {
            if (quick_view_campaign_expired === 0) {
                toastr.error('The campaign is over, Sorry! you can not cart this product');
                return false;
            }
        }

        let selected_size = $('#selected_size').val();
        let selected_color = $('#selected_color').val();

        let pid_id = getQuickViewAttributesForCart();

        let product_id = quick_view_product_id;
        let quantity = Number($('#quick-view-quantity').val().trim());
        let price = $('#price').text().split(site_currency_symbol)[1];
        let attributes = {};
        let product_variant = pid_id;
        let productAttribute = quick_view_selected_variant;

        attributes['price'] = price;

        // if selected attribute is a valid product item
        if (quickViewValidateSelectedAttributes()) {
            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.wishlist.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: selected_size,
                    selected_color: selected_color,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        $('.track-icon-list').load(location.href + " .track-icon-list");
                    }
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });
        } else {
            toastr.error('<?php echo e(__("Select all attribute to proceed")); ?>')
        }
    });

    $(document).on('click', '.quick_view_but_now', function (e) {
        e.preventDefault();

        let selected_size = $('#selected_size').val();
        let selected_color = $('#selected_color').val();

        let pid_id = getQuickViewAttributesForCart();

        let product_id = quick_view_product_id;
        let quantity = Number($('#quick-view-quantity').val().trim());
        let price = $('#price').text().split(site_currency_symbol)[1];
        let attributes = {};
        let product_variant = pid_id;
        let productAttribute = quick_view_selected_variant;

        attributes['price'] = price;

        // if selected attribute is a valid product item
        if (quickViewValidateSelectedAttributes()) {
            $.ajax({
                url: '<?php echo e(route("tenant.shop.product.add.to.cart.ajax")); ?>',
                type: 'POST',
                data: {
                    product_id: product_id,
                    quantity: quantity,
                    pid_id: pid_id,
                    product_variant: product_variant,
                    selected_size: selected_size,
                    selected_color: selected_color,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                beforeSend: function () {

                },
                success: function (data) {
                    if (data.quantity_msg) {
                        toastr.warning(data.quantity_msg);
                    } else if (data.error_msg) {
                        toastr.error(data.error_msg);
                    } else {
                        toastr.success(data.msg, '<?php echo e(__('Go to Cart')); ?>', '#', 60000);
                        $('.track-icon-list').load(location.href + " .track-icon-list");
                    }

                    setTimeout(() => {
                        location.href = "<?php echo e(route('tenant.shop.checkout')); ?>";
                    }, 2000)
                },
                error: function (err) {
                    toastr.error('<?php echo e(__("An error occurred")); ?>')
                }
            });
        } else {
            toastr.error('<?php echo e(__("Select all attribute to proceed")); ?>')
        }
    });

    /* ========================================
                Product Quantity JS
    ========================================*/

    $(document).on('click', '.quick-view-plus', function () {
        var selectedInput = $(this).prev('.quick-view-quantity-input');
        if (selectedInput.val()) {
            selectedInput[0].stepUp(1);
        }
    });

    $(document).on('click', '.quick-view-substract', function () {
        var selectedInput = $(this).next('.quick-view-quantity-input');
        if (selectedInput.val() > 1) {
            selectedInput[0].stepDown(1);
        }
    });
</script>

<?php echo $__env->make("components.tenant.product.quick-view-js", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.5/swiper-bundle.min.js"></script>

<script> var swiper = new Swiper('.swiper-product-list', {
        autoplay: {delay: 5000,},
        speed: 300,
        navigation: {nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev'},
        slidesPerView: 1,
        spaceBetween: 0,
        breakpoints: {
            0: {slidesPerView: 2, spaceBetween: 10,},
            400: {slidesPerView: 2, spaceBetween: 10,},
            415: {slidesPerView: 2, spaceBetween: 10,},
            600: {slidesPerView: 3, spaceBetween: 10,},
            768: {slidesPerView: 4, spaceBetween: 10,},
            800: {slidesPerView: 4, spaceBetween: 12,},
            1000: {slidesPerView: 3, spaceBetween: 30,},
            1024: {slidesPerView: 4, spaceBetween: 15,},
            1152: {slidesPerView: 4, spaceBetween: 15,},
            1280: {slidesPerView: 4, spaceBetween: 13,},
            1600: {slidesPerView: 4, spaceBetween: 13,},
            1920: {slidesPerView: 4, spaceBetween: 13,},
            2560: {slidesPerView: 4, spaceBetween: 13,},
        }, /*enable auto height*/
    });</script>

<script !src="">
    window.addEventListener('load', function () {
        window.dispatchEvent(new Event('resize'));
    });
</script>
<script> /* Slider Main Carousel */
    var swiper = new Swiper('.swiper-container', {
        effect: 'slide',
        navigation: {nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev'},
        pagination: {el: '.swiper-pagination', clickable: true,},
        autoplay: true,
        speed: 1300,
        on: {
            slideChangeTransitionStart: function () {
                $('.slider-section').hide(0);
                $('.slider-section').removeClass('aos-init').removeClass('aos-animate');
            }, slideChangeTransitionEnd: function () {
                $('.slider-section').show(0);
                AOS.init();
            }
        }
    });
    AOS.init();/*  <========SON=========>>> Slider Main Carousel SON */
</script>

<!-- ToTop Module -->
<a href="javascript:" id="return-to-top">
    <i class="fa fa-chevron-up"></i>
</a> <!-- ToTop Module End -->
<?php echo $__env->yieldContent('scripts'); ?>



<?php echo get_static_option('site_third_party_tracking_code'); ?>


<?php echo renderBodyEndHooks(); ?>

</body>
</html>
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/frontend/partials/footer.blade.php ENDPATH**/ ?>