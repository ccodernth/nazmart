<?php $__env->startSection('title'); ?>
    <?php echo e($category->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e($category->name); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .discount-timer {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            text-align: center;
            margin: 0 20px;
            z-index: 95;
        }
        .discount-timer .global-timer .syotimer__body {
            gap: 10px 15px;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }
        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .discount-timer .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .discount-timer .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .discount-timer .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .discount-timer .global-timer .syotimer__body {
                gap: 10px;
            }
        }
        .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
            font-size: 32px;
            line-height: 36px;
        }
        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__value {
                font-size: 28px;
            }
        }
        .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
            font-size: 18px;
            line-height: 28px;
        }
        @media (min-width: 1400px) and (max-width: 1599.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 1200px) and (max-width: 1399.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 992px) and (max-width: 1199.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
        @media (min-width: 300px) and (max-width: 991.98px) {
            .discount-timer .global-timer .syotimer__body .syotimer-cell .syotimer-cell__unit {
                font-size: 16px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Shop area starts -->
    <section class="shop-area padding-top-100 padding-bottom-50">
        <div class="container-one">
            <div class="shop-contents-wrapper">
                <div class="shop-grid-contents">
                    <div class="grid-product-list">
                        <div id="tab-grid2" class="tab-content-item active">
                            <div class="row mt-4 gy-5">
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $data = get_product_dynamic_price($product);
                                        $campaign_name = $data['campaign_name'];
                                        $regular_price = $data['regular_price'];
                                        $sale_price = $data['sale_price'];
                                        $discount = $data['discount'];
                                    ?>

                                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                                        <div class="global-card no-shadow radius-0 pb-0">
                                            <div class="global-card-thumb">
                                                <a href="<?php echo e(route('tenant.shop.product.details', $product->slug)); ?>">
                                                    <?php echo render_image_markup_by_attachment_id($product->image_id, '', 'grid'); ?>

                                                </a>
                                                <div class="global-card-thumb-badge right-side">
                                                    <?php if($discount != null): ?>
                                                        <span
                                                            class="global-card-thumb-badge-box bg-color-two"> <?php echo e($discount); ?>% <?php echo e(__('off')); ?> </span>
                                                    <?php endif; ?>

                                                    <?php if(!empty($product->badge)): ?>
                                                        <span
                                                            class="global-card-thumb-badge-box bg-color-new"> <?php echo e($product?->badge?->name); ?> </span>
                                                    <?php endif; ?>
                                                </div>

                                                <?php echo $__env->make('tenant.frontend.shop.partials.product-options', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                            </div>

                                            <div class="global-card-contents">
                                                <div class="global-card-contents-flex">
                                                    <h5 class="global-card-contents-title">
                                                        <a href="javascript:void(0)"> <?php echo Str::words($product->name, 15); ?> </a>
                                                    </h5>
                                                    <?php echo render_product_star_rating_markup_with_count($product); ?>

                                                </div>
                                                <div class="price-update-through mt-3">
                                                    <span class="flash-prices color-two"> <?php echo e(float_amount_with_currency_symbol($sale_price)); ?> </span>
                                                    <span
                                                        class="flash-old-prices"> <?php echo e($regular_price != null ? float_amount_with_currency_symbol($regular_price) : ''); ?> </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop area end -->

    <!-- Shop Details Modal area end -->
    <?php echo $__env->make('tenant.frontend.shop.partials.product-quick-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- Shop Details Modal area end -->

    <?php echo $__env->make('tenant.frontend.shop.partials.shop-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        $(function () {
            $(document).on('click', 'ul.pagination .page-item a', function (e) {
                e.preventDefault();

                filter_product_request($(this).data('page'));
            })

            $(document).on('click', '.ad-values, .active-list .list, .price-search-btn', function (e) {
                // e.preventDefault();
                let currentPage = $(".pagination .page-item .page-link.active").attr("data-page");
                filter_product_request(currentPage);
            })

            // Wishlist Product
            $(document).on('click', '.wishlist-btn', function (e) {
                let el = $(this);
                let product = el.data('product_id');

                $.ajax({
                    url: '<?php echo e(route('tenant.shop.wishlist.product')); ?>',
                    type: 'GET',
                    data: {
                        product_id: product
                    },
                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        $('.loader').hide();


                        if (data.type === 'success') {
                            toastr.success(data.msg)
                        } else {
                            toastr.error(data.msg);
                        }
                    },
                    error: function (data) {
                        $('.loader').hide();
                    }
                });
            });

            /*========================================
                Click Clear Filter
            ========================================*/
            $(document).on('click', '.click-hide-filter .click-hide', function () {
                let filter_name = '.' + $(this).parent().data('filter') + ' .active';
                $(filter_name).removeClass('active');

                filter_product_request();

                $(this).parent().remove();

                let filter_children = $('.selected-flex-list').children();
                if (filter_children.length === 0) {
                    $('.selectder-filter-contents').fadeOut();
                }
            });

            $(document).on('click', '.click-hide-filter .click-hide-parent', function () {
                let filter_name = $(this).data('filter');

                if (filter_name === 'all') {
                    $('.active-list .active').removeClass('active');

                    $('.ui-range-value-min .min_price').text('0');
                    $('.ui-range-value-min input').val(0);

                    $('.ui-range-value-max .max_price').text('10000');
                    $('.ui-range-value-max input').val(10000);

                    $('.noUi-base .noUi-connect').css('left', '0%');
                    $('.noUi-base .noUi-background').css('left', '100%');

                    filter_product_request();

                    $('.selectder-filter-contents').fadeOut();
                    $(this).siblings('ul').html('');
                }
            });

            $(document).on('click', '.shop-nice-select ul.list li.option', function (e) {
                let sort = $(this).data('value');
                let currentPage = $(".pagination .page-item .page-link.active").attr("data-page");

                filter_product_request(currentPage, sort);
            });

            /*========================================
                Range Slider
            ========================================*/
            let i = document.querySelector(".ui-range-slider");
            if (void 0 !== i && null !== i) {
                let j = parseInt(i.parentNode.getAttribute("data-start-min"), 10),
                    k = parseInt(i.parentNode.getAttribute("data-start-max"), 10),
                    l = parseInt(i.parentNode.getAttribute("data-min"), 10),
                    m = parseInt(i.parentNode.getAttribute("data-max"), 10),
                    n = parseInt(i.parentNode.getAttribute("data-step"), 10),
                    o = document.querySelector(".ui-range-value-min span"),
                    p = document.querySelector(".ui-range-value-max span"),
                    q = document.querySelector(".ui-range-value-min input"),
                    r = document.querySelector(".ui-range-value-max input");

                noUiSlider.create(i, {
                    start: [j, k],
                    connect: !0,
                    step: n,
                    range: {
                        min: l,
                        max: m
                    },
                    behaviour: 'tap'
                }), i.noUiSlider.on("change", function (a, b) {
                    let c = a[b];

                    b ? (p.innerHTML = Math.round(c), r.value = Math.round(c)) : (o.innerHTML = Math.round(c), q.value = Math.round(c))

                    let currentPage = $(".pagination .page-item .page-link.active").attr("data-page");

                    filter_product_request(currentPage);
                })
            }

            function filter_product_request(page = null, sort = null) {
                let url = '<?php echo e(route('tenant.shop')); ?>';
                let category_slug = $('.category-lists .active').data('slug')
                let size_slug = $('.size-lists .active').data('slug')
                let color_slug = $('.color-lists .active').data('slug')
                let rating = $('.filter-lists .active').data('slug');
                let min_price = $('.ui-range-value-min input').val();
                let max_price = $('.ui-range-value-max input').val();
                let tag_slug = $('.tag-lists .active').data('slug');
                let requestPage = null;
                if (page !== null) {
                    requestPage = page
                }

                let sortBy = null;
                if (sort !== null) {
                    sortBy = sort;
                }

                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        'category': category_slug,
                        'size': size_slug,
                        'color': color_slug,
                        'rating': rating,
                        'min_price': min_price,
                        'max_price': max_price,
                        'tag': tag_slug,
                        'page': requestPage,
                        'sort': sortBy
                    },

                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        $(".grid-product-list").html(data.grid)
                        $(".list-product-list").html(data.list)

                        $(".shop-icons.active").trigger('click');

                        let paginationData = data.pagination;
                        let fromItems = paginationData.from;
                        let toItems = paginationData.to;
                        let totalItems = paginationData.total;

                        $('.showing-results').text('<?php echo e(__('Showing')); ?> ' + fromItems + ' - ' + totalItems + ' of ' + totalItems + ' <?php echo e(__('Results')); ?>');

                        setInterval(() => {
                            $('.loader').hide();
                        }, 700)
                    },
                    error: function (data) {

                    }
                });
            }

            $(document).on('keyup', 'input[name=search]', function (e) {
                let search = $(this).val();

                if (search === '') {
                    setTimeout(() => {
                        location.reload();
                    }, 500)
                }

                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('tenant.shop.search')); ?>',
                    data: {
                        'search': search,
                    },

                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        $(".grid-product-list").html(data.grid)
                        $(".list-product-list").html(data.list)

                        $(".shop-icons.active").trigger('click');

                        let paginationData = data.pagination;
                        let fromItems = paginationData.from !== null ? paginationData.from : 0;
                        let toItems = paginationData.to;
                        let totalItems = paginationData.total;

                        $('.showing-results').text('<?php echo e(__('Showing')); ?> ' + fromItems + ' - ' + totalItems + ' of ' + totalItems + ' <?php echo e(__('Results')); ?>');

                        setInterval(() => {
                            $('.loader').hide();
                        }, 700)
                    },
                    error: function (data) {

                    }
                });
            });

            /*========================================
                Product Quick View Modal
            ========================================*/
            $(document).on('click', 'a.popup-modal', function (e) {
                let el = $(this).parent();
                let id = el.data('id');
                let modal = $('#product-modal');

                $.ajax({
                    type: 'GET',
                    url: '<?php echo e(route('tenant.shop.quick.view')); ?>',
                    data: {
                        'id': id,
                    },

                    beforeSend: function () {
                        $('.loader').show();
                    },
                    success: function (data) {
                        modal.html(data.product_modal);

                        setInterval(() => {
                            $('.loader').hide();
                        }, 700)
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/themes/electro/frontend/shop/single_pages/category.blade.php ENDPATH**/ ?>