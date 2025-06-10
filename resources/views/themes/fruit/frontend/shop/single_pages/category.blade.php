@extends('tenant.frontend.frontend-page-master')

@section('title')
    {{ $category->name }}
@endsection

@section('page-title')
    {{ $category->name }}
@endsection

@section('style')

    <style>
        .pagination-sm .page-item:first-child .page-link,
        .page-item:first-child .page-link {
            border-radius: .2rem !important;

        }


    </style>
@endsection

@section('content')

    {{--@include(include_theme_path('shop.partials.shop-search'))

    @include(include_theme_path('shop.partials.shop-sidebar-content'))
    @include(include_theme_path('shop.partials.shop-grid-products'))--}}

    <div class="cat-detail-main-div">
        <div class="cat-detail-main-div-in">

            <div class="cat-right-header-out" style="width: 100%; padding: 0;  ">
                <div class="cat-right-header">
                    <div class="cat-right-links">
                    </div>
                    <div class="cat-right-head-text" style="color: #000000;">
                        {{ $category->name }}
                    </div>
                    <div class="cat-right-desc" style="color: #999999;">
                        {{ $category->description }}
                    </div>
                </div>
            </div>
            @include(include_theme_path('shop.partials.shop-search'))
            @include(include_theme_path('shop.partials.shop-sidebar-content'))
            <!-- left Nav !-->
            <!-- Products Area !-->


            <div class="cat-right-main">


                @include(include_theme_path('shop.partials.shop-grid-products'))


                <!-- Ürünler !-->
                {{--<div class="cat-detail-products">

                    <!-- Görünüm İşlemleri !-->
                    <!--  <========SON=========>>> Görünüm İşlemleri SON !-->
                    @foreach($products as $product)
                        @php
                            $data = get_product_dynamic_price($product);
                            $campaign_name = $data['campaign_name'];
                            $regular_price = $data['regular_price'];
                            $sale_price = $data['sale_price'];
/*                            $discount = $data['discount'];*/
                            $discount = 100 - round(($sale_price / $regular_price) * 100);

                        @endphp

                        <div class="cat-detail-products-box">

                            <div class="cat-detail-products-box-cart-1">

                                @include('tenant.frontend.shop.partials.product-options')

                                <a href="javascript:void(0)" data-product_id="{{ $product->id }}"
                                   data-tooltip="{{__('Add to Cart')}}"
                                   class="add-to-cart-btn tooltip-right">
                                    <i class="las la-shopping-basket"></i>
                                </a>

                                <a class="icon add-to-wishlist-btn tooltip-right"
                                   data-product_id="{{ $product->id }}" href="javascript:void(0)"
                                   data-tooltip="{{__('Add to Wishlist')}}">
                                    <i class="lar la-heart"></i>
                                </a>

                                <a class="icon compare-btn tooltip-right"
                                   data-product_id="{{ $product->id }}"
                                   data-tooltip="{{__('Add to Compare')}}" href="javascript:void(0)">
                                    <i class="las la-retweet"></i>
                                </a>

                            </div>
                            <div class="cat-detail-products-box-img ">
                                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                    {!! render_image_markup_by_attachment_id($product->image_id, '', 'grid') !!}
                                </a>
                            </div>

                            <div class="cat-detail-products-box-info">


                                <div class="cat-detail-products-box-marka">
                                    <a href="marka/e-meyve/" style="color: #000000;">
                                        {{ get_static_option('site_title') }} </a>
                                </div>
                                <div class="cat-detail-products-box-h">
                                    <a href="{{route('tenant.shop.product.details', $product->slug)}}"
                                       style="color: #000000;">
                                        {{ $product->name }} </a>
                                </div>
                            </div>
                            <div class="cat-detail-products-box-fiyat">
                                <div class="cat-detail-products-box-fiyat-out">
                                    @if($discount>0)
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            {{ amount_with_currency_symbol($regular_price)}}
                                        </div>
                                    @else
                                        <div class="cat-detail-products-box-fiyat-eski"
                                             style="color: #b0b0b0; visibility: hidden">Hide
                                        </div>
                                    @endif
                                    <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000;">
                                        {{amount_with_currency_symbol(calculatePrice($sale_price, $product))}}
                                    </div>
                                </div>
                                @if($discount>0)
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % {{ $discount }}
                                    </div>
                                @endif

                            </div>
                        </div>
                    @endforeach




                </div>--}}
                <!--  <========SON=========>>> Ürünler SON !-->

                <!---- Sayfalama Elementleri ================== !-->
                {{--<div class="category-pagination-out">
                    <nav aria-label="Page navigation">
                        <ul class="pagination pagination-sm ">
                            <li class="page-item active" aria-current="page">
                                <a class="page-link" href="#">1<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link"
                                                     href="#">2</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="#">3</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="#">4</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="#">5</a></li>
                            <li class="page-item"><a class="page-link"
                                                     href="#">6</a></li>
                            <li class="page-item"><a class="page-link" href="#">Sonrakı</a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">Son</a>
                            </li>
                        </ul>
                    </nav>
                </div>--}}
                <!---- Sayfalama Elementleri ================== !-->


            </div>
            <!--  <========SON=========>>> Products Area SON !-->
        </div>
    </div>


    {{-- <!-- Shop area starts -->
     <section class="shop-area padding-top-100 padding-bottom-50">
         <div class="container-one">
             <div class="shop-contents-wrapper">
             </div>
         </div>
     </section>
     <!-- Shop area end -->--}}

    <!-- Shop Details Modal area end -->
    @include(include_theme_path('shop.partials.product-quick-view'))
    <!-- Shop Details Modal area end -->

    {{--
        @include(include_theme_path('shop.partials.shop-footer'))
    --}}



    {{--<!-- Shop area starts -->
    <section class="shop-area padding-top-100 padding-bottom-50">
        <div class="container-one">
            <div class="shop-contents-wrapper">
                <div class="shop-grid-contents">
                    <div class="grid-product-list">
                        <div id="tab-grid2" class="tab-content-item active">
                            <div class="row mt-4 gy-5">
                                @foreach($products as $product)
                                    @php
                                        $data = get_product_dynamic_price($product);
                                        $campaign_name = $data['campaign_name'];
                                        $regular_price = $data['regular_price'];
                                        $sale_price = $data['sale_price'];
                                        $discount = $data['discount'];

                                        $final_price = calculatePrice($sale_price, $product);
                                    @endphp

                                    <div class="col-xxl-3 col-lg-6 col-sm-6">
                                        <div class="global-card no-shadow radius-0 pb-0">
                                            <div class="global-card-thumb">
                                                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                                    {!! render_image_markup_by_attachment_id($product->image_id, '', 'grid') !!}
                                                </a>
                                                <div class="global-card-thumb-badge right-side">
                                                    @if($discount != null)
                                                        <span
                                                            class="global-card-thumb-badge-box bg-color-two"> {{$discount}}% {{__('off')}} </span>
                                                    @endif

                                                    @if(!empty($product->badge))
                                                        <span
                                                            class="global-card-thumb-badge-box bg-color-new"> {{$product?->badge?->name}} </span>
                                                    @endif
                                                </div>

                                                @include('tenant.frontend.shop.partials.product-options')
                                            </div>

                                            <div class="global-card-contents">
                                                <div class="global-card-contents-flex">
                                                    <h5 class="global-card-contents-title">
                                                        <a href="javascript:void(0)"> {!! Str::words($product->name, 15) !!} </a>
                                                    </h5>
                                                    {!! render_product_star_rating_markup_with_count($product) !!}
                                                </div>
                                                <div class="price-update-through mt-3">
                                                    <span class="flash-prices color-two"> {{amount_with_currency_symbol($final_price)}} </span>
                                                    <span
                                                        class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop area end -->
--}}
    {{--<!-- Shop Details Modal area end -->
    @include('tenant.frontend.shop.partials.product-quick-view')
    <!-- Shop Details Modal area end -->

    @include('tenant.frontend.shop.partials.shop-footer')--}}
@endsection

@section('scripts')
    <script>
        $(function () {
            $(document).on('click', 'ul.pagination .page-item a', function (e) {
                e.preventDefault();

                filter_product_request($(this).data('page'));
            })

            $(document).ready(function () {
                var url = window.location.href; // Mevcut URL'yi al
                if (url.includes("subcategory/")) { // "subcategory/" varsa
                    var data = url.split("subcategory/")[1]; // "subcategory/" sonrası kısmı al

                    $('.category-lists .list').each(function () {
                        var slug = $(this).data('slug'); // "data-slug" değerini al
                        if (slug === data) {
                            $(this).addClass('active'); // "active" sınıfını ekle
                            let filters = $('#_porduct_fitler_item li.show-value');

                            let contains = $('#_porduct_fitler_item .category-filter');

                            let value = $(this).data('value');
                            if (contains.length === 0) {
                                $('.click-hide-filter').show();
                                $('#_porduct_fitler_item').append(`<li class="show-value category-filter 1111" value="${value}" data-filter="category-lists" data-slug="${slug}"><a class="click-hide" href="javascript:void(0)"> ${value} </a> </li>`);
                            } else {
                                contains.attr('value', value);
                                contains.attr('data-slug', slug);
                                contains.find('a').text(value);
                            }
                        } else {
                            $(this).removeClass('active'); // Diğerlerinden "active" sınıfını kaldır
                        }
                    });
                } else {
                    console.log("URL'de 'subcategory' bulunamadı.");
                }
            });


            $(document).on('click', '.ad-values, .active-list .list, .price-search-btn', function (e) {
                // e.preventDefault();
                let currentPage = $(".pagination .page-item .page-link.active").attr("data-page");
                filter_product_request(null);
            })

            // Wishlist Product
            $(document).on('click', '.wishlist-btn', function (e) {
                let el = $(this);
                let product = el.data('product_id');

                $.ajax({
                    url: '{{route('tenant.shop.wishlist.product')}}',
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

                console.log(filter_name)
                filter_product_request();

                $(this).parent().remove();

                let filter_children = $('.selected-flex-list').children();
                if (filter_children.length === 0) {
                    $('.selectder-filter-contents').fadeOut();
                }
            });
            $(document).on('click', '.click-hide-filter .click-hide.click-hide-price', function () {

                $('.ui-range-value-min .min_price').text('0');
                $('.ui-range-value-min input').val(0);

                $('.ui-range-value-max .max_price').text('10000');
                $('.ui-range-value-max input').val(10000);

                $('.noUi-base .noUi-connect').css('left', '0%');
                $('.noUi-base .noUi-background').css('left', '100%');


                filter_product_request();
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

                filter_product_request(null, sort);
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


                setTimeout(function () {

                    let cat_type = 'subcategory';
                    let url = '{{route('tenant.shop')}}';
                    let category_slug = $('.category-lists .list.active').data('slug')
                    let size_slug = $('.size-lists.active-list li.list.active').data('slug')
                    let color_slug = $('.color-lists .active').data('slug')
                    let rating = $('.filter-lists .active').data('slug');
                    let min_price = $('.ui-range-value-min input').val();
                    let max_price = $('.ui-range-value-max input').val();
                    let tag_slug = $('.tag-lists .active').data('slug');
                    let requestPage = null;

                    if (page !== null) {
                        requestPage = page
                    }

                    console.log('dış', category_slug)

                    if (category_slug === undefined) {
                        console.log('iç', category_slug)
                        let urlCategory = window.location.href; // Mevcut URL'yi al
                        if (urlCategory.includes("category/")) { // "subcategory/" varsa
                            category_slug = urlCategory.split("category/")[1];
                            cat_type = 'category';
                        }

                        console.log(category_slug, urlCategory, urlCategory.split("category/")[1])
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
                            'sort': sortBy,
                            'cat_type': cat_type
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

                            $('.showing-results').text('{{__('Showing')}} ' + fromItems + ' - ' + totalItems + ' of ' + totalItems + ' {{__('Results')}}');

                            setInterval(() => {
                                $('.loader').hide();
                            }, 700)
                        },
                        error: function (data) {

                        }
                    });
                }, 300);
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
                    url: '{{route('tenant.shop.search')}}',
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

                        $('.showing-results').text('{{__('Showing')}} ' + fromItems + ' - ' + totalItems + ' of ' + totalItems + ' {{__('Results')}}');

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
                    url: '{{route('tenant.shop.quick.view')}}',
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


        /*===================
            Nice Select JS
           ==================*/
        (function ($) {
            $.fn.niceSelect = function (method) {
                if (typeof method == 'string') {
                    if (method == 'update') {
                        this.each(function () {
                            var $select = $(this);
                            var $dropdown = $(this).next('.nice-select');
                            var open = $dropdown.hasClass('open');
                            if ($dropdown.length) {
                                $dropdown.remove();
                                create_nice_select($select);
                                if (open) {
                                    $select.next().trigger('click')
                                }
                            }
                        })
                    } else if (method == 'destroy') {
                        this.each(function () {
                            var $select = $(this);
                            var $dropdown = $(this).next('.nice-select');
                            if ($dropdown.length) {
                                $dropdown.remove();
                                $select.css('display', '')
                            }
                        });
                        if ($('.nice-select').length == 0) {
                            $(document).off('.nice_select')
                        }
                    } else {
                        console.log('Method "' + method + '" does not exist.')
                    }
                    return this
                }
                this.hide();
                this.each(function () {
                    var $select = $(this);
                    if (!$select.next().hasClass('nice-select')) {
                        create_nice_select($select)
                    }
                });

                function create_nice_select($select) {
                    $select.after($('<div></div>').addClass('nice-select').addClass($select.attr('class') || '').addClass($select.attr('disabled') ? 'disabled' : '').addClass($select.attr('multiple') ? 'has-multiple' : '').attr('tabindex', $select.attr('disabled') ? null : '0').html($select.attr('multiple') ? '<span class="multiple-options"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="..."/></div><ul class="list"></ul>' : '<span class="current"></span><div class="nice-select-search-box"><input type="text" class="nice-select-search" placeholder="..."/></div><ul class="list"></ul>'));
                    var $dropdown = $select.next();
                    var $options = $select.find('option');
                    if ($select.attr('multiple')) {
                        var $selected = $select.find('option:selected');
                        var $selected_html = '';
                        $selected.each(function () {
                            $selected_option = $(this);
                            $selected_text = $selected_option.data('display') || $selected_option.text();
                            if (!$selected_option.val()) {
                                return
                            }
                            $selected_html += '<span class="current">' + $selected_text + '</span>'
                        });
                        $select_placeholder = $select.data('js-placeholder') || $select.attr('js-placeholder');
                        $select_placeholder = !$select_placeholder ? 'Select' : $select_placeholder;
                        console.log($select_placeholder);
                        $selected_html = $selected_html === '' ? $select_placeholder : $selected_html;
                        $dropdown.find('.multiple-options').html($selected_html)
                    } else {
                        var $selected = $select.find('option:selected');
                        $dropdown.find('.current').html($selected.data('display') || $selected.text())
                    }
                    $options.each(function (i) {
                        var $option = $(this);
                        var display = $option.data('display');
                        $dropdown.find('ul').append($('<li></li>').attr('data-value', $option.val()).attr('data-display', (display || null)).addClass('option' + ($option.is(':selected') ? ' selected' : '') + ($option.is(':disabled') ? ' disabled' : '')).html($option.text()))
                    })
                }

                $(document).off('.nice_select');
                $(document).on('click.nice_select', '.nice-select', function (event) {
                    var $dropdown = $(this);
                    $('.nice-select').not($dropdown).removeClass('open');
                    $dropdown.toggleClass('open');
                    if ($dropdown.hasClass('open')) {
                        $dropdown.find('.option');
                        $dropdown.find('.nice-select-search').val('');
                        $dropdown.find('.nice-select-search').focus();
                        $dropdown.find('.focus').removeClass('focus');
                        $dropdown.find('.selected').addClass('focus');
                        $dropdown.find('ul li').show()
                    } else {
                        $dropdown.focus()
                    }
                });
                $(document).on('click', '.nice-select-search-box', function (event) {
                    event.stopPropagation();
                    return !1
                });
                $(document).on('keyup.nice-select-search', '.nice-select', function () {
                    var $self = $(this);
                    var $text = $self.find('.nice-select-search').val();
                    var $options = $self.find('ul li');
                    if ($text == '')
                        $options.show();
                    else if ($self.hasClass('open')) {
                        $text = $text.toLowerCase();
                        var $matchReg = new RegExp($text);
                        if (0 < $options.length) {
                            $options.each(function () {
                                var $this = $(this);
                                var $optionText = $this.text().toLowerCase();
                                var $matchCheck = $matchReg.test($optionText);
                                $matchCheck ? $this.show() : $this.hide()
                            })
                        } else {
                            $options.show()
                        }
                    }
                    $self.find('.option'), $self.find('.focus').removeClass('focus'), $self.find('.selected').addClass('focus')
                });
                $(document).on('click.nice_select', function (event) {
                    if ($(event.target).closest('.nice-select').length === 0) {
                        $('.nice-select').removeClass('open').find('.option')
                    }
                });
                $(document).on('click.nice_select', '.nice-select .option:not(.disabled)', function (event) {
                    var $option = $(this);
                    var $dropdown = $option.closest('.nice-select');
                    if ($dropdown.hasClass('has-multiple')) {
                        console.log('clicked', $option);
                        if ($option.hasClass('selected')) {
                            $option.removeClass('selected')
                        } else {
                            $option.addClass('selected')
                        }
                        $selected_html = '';
                        $selected_values = [];
                        $dropdown.find('.selected').each(function () {
                            $selected_option = $(this);
                            var text = $selected_option.data('display') || $selected_option.text();
                            $selected_html += '<span class="current">' + text + '</span>';
                            $selected_values.push($selected_option.data('value'))
                        });
                        $select_placeholder = $dropdown.prev('select').data('js-placeholder') || $dropdown.prev('select').attr('js-placeholder');
                        console.log($dropdown.prev('select'));
                        $select_placeholder = !$select_placeholder ? 'Select' : $select_placeholder;
                        $selected_html = $selected_html === '' ? $select_placeholder : $selected_html;
                        $dropdown.find('.multiple-options').html($selected_html);
                        $dropdown.prev('select').val($selected_values).trigger('change')
                    } else {
                        $dropdown.find('.selected').removeClass('selected');
                        $option.addClass('selected');
                        var text = $option.data('display') || $option.text();
                        $dropdown.find('.current').text(text);
                        $dropdown.prev('select').val($option.data('value')).trigger('change')
                    }
                });
                $(document).on('keydown.nice_select', '.nice-select', function (event) {
                    var $dropdown = $(this);
                    var $focused_option = $($dropdown.find('.focus') || $dropdown.find('.list .option.selected'));
                    if (event.keyCode == 32 || event.keyCode == 13) {
                        if ($dropdown.hasClass('open')) {
                            $focused_option.trigger('click')
                        } else {
                            $dropdown.trigger('click')
                        }
                        return !1
                    } else if (event.keyCode == 40) {
                        if (!$dropdown.hasClass('open')) {
                            $dropdown.trigger('click')
                        } else {
                            var $next = $focused_option.nextAll('.option:not(.disabled)').first();
                            if ($next.length > 0) {
                                $dropdown.find('.focus').removeClass('focus');
                                $next.addClass('focus')
                            }
                        }
                        return !1
                    } else if (event.keyCode == 38) {
                        if (!$dropdown.hasClass('open')) {
                            $dropdown.trigger('click')
                        } else {
                            var $prev = $focused_option.prevAll('.option:not(.disabled)').first();
                            if ($prev.length > 0) {
                                $dropdown.find('.focus').removeClass('focus');
                                $prev.addClass('focus')
                            }
                        }
                        return !1
                    } else if (event.keyCode == 27) {
                        if ($dropdown.hasClass('open')) {
                            $dropdown.trigger('click')
                        }
                    } else if (event.keyCode == 9) {
                        if ($dropdown.hasClass('open')) {
                            return !1
                        }
                    }
                });
                var style = document.createElement('a').style;
                style.cssText = 'pointer-events:auto';
                if (style.pointerEvents !== 'auto') {
                    $('html').addClass('no-csspointerevents')
                }
                return this
            }
        }(jQuery))


        /*===================
          Nice Scroll JS
         ==================*/
        /* jquery.nicescroll v3.7.6 InuYaksa - MIT - https://nicescroll.areaaperta.com */
        !function (e) {
            "function" == typeof define && define.amd ? define(["jquery"], e) : "object" == typeof exports ? module.exports = e(require("jquery")) : e(jQuery)
        }
        (function (e) {
            "use strict";
            var o = !1,
                t = !1,
                r = 0,
                i = 2e3,
                s = 0,
                n = e,
                l = document,
                a = window,
                c = n(a),
                d = [],
                u = a.requestAnimationFrame || a.webkitRequestAnimationFrame || a.mozRequestAnimationFrame || !1,
                h = a.cancelAnimationFrame || a.webkitCancelAnimationFrame || a.mozCancelAnimationFrame || !1;
            if (u) a.cancelAnimationFrame || (h = function (e) {
            });
            else {
                var p = 0;
                u = function (e, o) {
                    var t = (new Date).getTime(),
                        r = Math.max(0, 16 - (t - p)),
                        i = a.setTimeout(function () {
                            e(t + r)
                        }, r);
                    return p = t + r, i
                }, h = function (e) {
                    a.clearTimeout(e)
                }
            }
            var m = a.MutationObserver || a.WebKitMutationObserver || !1,
                f = Date.now || function () {
                    return (new Date).getTime()
                },
                g = {
                    zindex: "auto",
                    cursoropacitymin: 0,
                    cursoropacitymax: 1,
                    cursorcolor: "#424242",
                    cursorwidth: "6px",
                    cursorborder: "1px solid #fff",
                    cursorborderradius: "5px",
                    scrollspeed: 40,
                    mousescrollstep: 27,
                    touchbehavior: !1,
                    emulatetouch: !1,
                    hwacceleration: !0,
                    usetransition: !0,
                    boxzoom: !1,
                    dblclickzoom: !0,
                    gesturezoom: !0,
                    grabcursorenabled: !0,
                    autohidemode: !0,
                    background: "",
                    iframeautoresize: !0,
                    cursorminheight: 32,
                    preservenativescrolling: !0,
                    railoffset: !1,
                    railhoffset: !1,
                    bouncescroll: !0,
                    spacebarenabled: !0,
                    railpadding: {top: 0, right: 0, left: 0, bottom: 0},
                    disableoutline: !0,
                    horizrailenabled: !0,
                    railalign: "right",
                    railvalign: "bottom",
                    enabletranslate3d: !0,
                    enablemousewheel: !0,
                    enablekeyboard: !0,
                    smoothscroll: !0,
                    sensitiverail: !0,
                    enablemouselockapi: !0,
                    cursorfixedheight: !1,
                    directionlockdeadzone: 6,
                    hidecursordelay: 400,
                    nativeparentscrolling: !0,
                    enablescrollonselection: !0,
                    overflowx: !0,
                    overflowy: !0,
                    cursordragspeed: .3,
                    rtlmode: "auto",
                    cursordragontouch: !1,
                    oneaxismousemode: "auto",
                    scriptpath: function () {
                        var e = l.currentScript || function () {
                                var e = l.getElementsByTagName("script");
                                return !!e.length && e[e.length - 1]
                            }(),
                            o = e ? e.src.split("?")[0] : "";
                        return o.split("/").length > 0 ? o.split("/").slice(0, -1).join("/") + "/" : ""
                    }(),
                    preventmultitouchscrolling: !0,
                    disablemutationobserver: !1,
                    enableobserver: !0,
                    scrollbarid: !1
                },
                v = !1,
                w = function () {
                    if (v) return v;
                    var e = l.createElement("DIV"),
                        o = e.style,
                        t = navigator.userAgent,
                        r = navigator.platform,
                        i = {};
                    return i.haspointerlock = "pointerLockElement" in l || "webkitPointerLockElement" in l || "mozPointerLockElement" in l, i.isopera = "opera" in a, i.isopera12 = i.isopera && "getUserMedia" in navigator, i.isoperamini = "[object OperaMini]" === Object.prototype.toString.call(a.operamini), i.isie = "all" in l && "attachEvent" in e && !i.isopera, i.isieold = i.isie && !("msInterpolationMode" in o), i.isie7 = i.isie && !i.isieold && (!("documentMode" in l) || 7 === l.documentMode), i.isie8 = i.isie && "documentMode" in l && 8 === l.documentMode, i.isie9 = i.isie && "performance" in a && 9 === l.documentMode, i.isie10 = i.isie && "performance" in a && 10 === l.documentMode, i.isie11 = "msRequestFullscreen" in e && l.documentMode >= 11, i.ismsedge = "msCredentials" in a, i.ismozilla = "MozAppearance" in o, i.iswebkit = !i.ismsedge && "WebkitAppearance" in o, i.ischrome = i.iswebkit && "chrome" in a, i.ischrome38 = i.ischrome && "touchAction" in o, i.ischrome22 = !i.ischrome38 && i.ischrome && i.haspointerlock, i.ischrome26 = !i.ischrome38 && i.ischrome && "transition" in o, i.cantouch = "ontouchstart" in l.documentElement || "ontouchstart" in a, i.hasw3ctouch = (a.PointerEvent || !1) && (navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0), i.hasmstouch = !i.hasw3ctouch && (a.MSPointerEvent || !1), i.ismac = /^mac$/i.test(r), i.isios = i.cantouch && /iphone|ipad|ipod/i.test(r), i.isios4 = i.isios && !("seal" in Object), i.isios7 = i.isios && "webkitHidden" in l, i.isios8 = i.isios && "hidden" in l, i.isios10 = i.isios && a.Proxy, i.isandroid = /android/i.test(t), i.haseventlistener = "addEventListener" in e, i.trstyle = !1, i.hastransform = !1, i.hastranslate3d = !1, i.transitionstyle = !1, i.hastransition = !1, i.transitionend = !1, i.trstyle = "transform", i.hastransform = "transform" in o || function () {
                        for (var e = ["msTransform", "webkitTransform", "MozTransform", "OTransform"], t = 0, r = e.length; t < r; t++)
                            if (void 0 !== o[e[t]]) {
                                i.trstyle = e[t];
                                break
                            }
                        i.hastransform = !!i.trstyle
                    }(), i.hastransform && (o[i.trstyle] = "translate3d(1px,2px,3px)", i.hastranslate3d = /translate3d/.test(o[i.trstyle])), i.transitionstyle = "transition", i.prefixstyle = "", i.transitionend = "transitionend", i.hastransition = "transition" in o || function () {
                        i.transitionend = !1;
                        for (var e = ["webkitTransition", "msTransition", "MozTransition", "OTransition", "OTransition", "KhtmlTransition"], t = ["-webkit-", "-ms-", "-moz-", "-o-", "-o", "-khtml-"], r = ["webkitTransitionEnd", "msTransitionEnd", "transitionend", "otransitionend", "oTransitionEnd", "KhtmlTransitionEnd"], s = 0, n = e.length; s < n; s++)
                            if (e[s] in o) {
                                i.transitionstyle = e[s], i.prefixstyle = t[s], i.transitionend = r[s];
                                break
                            }
                        i.ischrome26 && (i.prefixstyle = t[1]), i.hastransition = i.transitionstyle
                    }(), i.cursorgrabvalue = function () {
                        var e = ["grab", "-webkit-grab", "-moz-grab"];
                        (i.ischrome && !i.ischrome38 || i.isie) && (e = []);
                        for (var t = 0, r = e.length; t < r; t++) {
                            var s = e[t];
                            if (o.cursor = s, o.cursor == s) return s
                        }
                        return "url(https://cdnjs.cloudflare.com/ajax/libs/slider-pro/1.3.0/css/images/openhand.cur),n-resize"
                    }(), i.hasmousecapture = "setCapture" in e, i.hasMutationObserver = !1 !== m, e = null, v = i, i
                },
                b = function (e, p) {
                    function v() {
                        var e = T.doc.css(P.trstyle);
                        return !(!e || "matrix" != e.substr(0, 6)) && e.replace(/^.*\((.*)\)$/g, "$1").replace(/px/g, "").split(/, +/)
                    }

                    function b() {
                        var e = T.win;
                        if ("zIndex" in e) return e.zIndex();
                        for (; e.length > 0;) {
                            if (9 == e[0].nodeType) return !1;
                            var o = e.css("zIndex");
                            if (!isNaN(o) && 0 !== o) return parseInt(o);
                            e = e.parent()
                        }
                        return !1
                    }

                    function x(e, o, t) {
                        var r = e.css(o),
                            i = parseFloat(r);
                        if (isNaN(i)) {
                            var s = 3 == (i = I[r] || 0) ? t ? T.win.outerHeight() - T.win.innerHeight() : T.win.outerWidth() - T.win.innerWidth() : 1;
                            return T.isie8 && i && (i += 1), s ? i : 0
                        }
                        return i
                    }

                    function S(e, o, t, r) {
                        T._bind(e, o, function (r) {
                            var i = {
                                original: r = r || a.event,
                                target: r.target || r.srcElement,
                                type: "wheel",
                                deltaMode: "MozMousePixelScroll" == r.type ? 0 : 1,
                                deltaX: 0,
                                deltaZ: 0,
                                preventDefault: function () {
                                    return r.preventDefault ? r.preventDefault() : r.returnValue = !1, !1
                                },
                                stopImmediatePropagation: function () {
                                    r.stopImmediatePropagation ? r.stopImmediatePropagation() : r.cancelBubble = !0
                                }
                            };
                            return "mousewheel" == o ? (r.wheelDeltaX && (i.deltaX = -.025 * r.wheelDeltaX), r.wheelDeltaY && (i.deltaY = -.025 * r.wheelDeltaY), !i.deltaY && !i.deltaX && (i.deltaY = -.025 * r.wheelDelta)) : i.deltaY = r.detail, t.call(e, i)
                        }, r)
                    }

                    function z(e, o, t, r) {
                        T.scrollrunning || (T.newscrolly = T.getScrollTop(), T.newscrollx = T.getScrollLeft(), D = f());
                        var i = f() - D;
                        if (D = f(), i > 350 ? A = 1 : A += (2 - A) / 10, e = e * A | 0, o = o * A | 0, e) {
                            if (r)
                                if (e < 0) {
                                    if (T.getScrollLeft() >= T.page.maxw) return !0
                                } else if (T.getScrollLeft() <= 0) return !0;
                            var s = e > 0 ? 1 : -1;
                            X !== s && (T.scrollmom && T.scrollmom.stop(), T.newscrollx = T.getScrollLeft(), X = s), T.lastdeltax -= e
                        }
                        if (o) {
                            if (function () {
                                var e = T.getScrollTop();
                                if (o < 0) {
                                    if (e >= T.page.maxh) return !0
                                } else if (e <= 0) return !0
                            }()) {
                                if (M.nativeparentscrolling && t && !T.ispage && !T.zoomactive) return !0;
                                var n = T.view.h >> 1;
                                T.newscrolly < -n ? (T.newscrolly = -n, o = -1) : T.newscrolly > T.page.maxh + n ? (T.newscrolly = T.page.maxh + n, o = 1) : o = 0
                            }
                            var l = o > 0 ? 1 : -1;
                            B !== l && (T.scrollmom && T.scrollmom.stop(), T.newscrolly = T.getScrollTop(), B = l), T.lastdeltay -= o
                        }
                        (o || e) && T.synched("relativexy", function () {
                            var e = T.lastdeltay + T.newscrolly;
                            T.lastdeltay = 0;
                            var o = T.lastdeltax + T.newscrollx;
                            T.lastdeltax = 0, T.rail.drag || T.doScrollPos(o, e)
                        })
                    }

                    function k(e, o, t) {
                        var r, i;
                        return !(t || !q) || (0 === e.deltaMode ? (r = -e.deltaX * (M.mousescrollstep / 54) | 0, i = -e.deltaY * (M.mousescrollstep / 54) | 0) : 1 === e.deltaMode && (r = -e.deltaX * M.mousescrollstep * 50 / 80 | 0, i = -e.deltaY * M.mousescrollstep * 50 / 80 | 0), o && M.oneaxismousemode && 0 === r && i && (r = i, i = 0, t && (r < 0 ? T.getScrollLeft() >= T.page.maxw : T.getScrollLeft() <= 0) && (i = r, r = 0)), T.isrtlmode && (r = -r), z(r, i, t, !0) ? void (t && (q = !0)) : (q = !1, e.stopImmediatePropagation(), e.preventDefault()))
                    }

                    var T = this;
                    this.version = "3.7.6", this.name = "nicescroll", this.me = p;
                    var E = n("body"),
                        M = this.opt = {doc: E, win: !1};
                    if (n.extend(M, g), M.snapbackspeed = 80, e)
                        for (var L in M) void 0 !== e[L] && (M[L] = e[L]);
                    if (M.disablemutationobserver && (m = !1), this.doc = M.doc, this.iddoc = this.doc && this.doc[0] ? this.doc[0].id || "" : "", this.ispage = /^BODY|HTML/.test(M.win ? M.win[0].nodeName : this.doc[0].nodeName), this.haswrapper = !1 !== M.win, this.win = M.win || (this.ispage ? c : this.doc), this.docscroll = this.ispage && !this.haswrapper ? c : this.win, this.body = E, this.viewport = !1, this.isfixed = !1, this.iframe = !1, this.isiframe = "IFRAME" == this.doc[0].nodeName && "IFRAME" == this.win[0].nodeName, this.istextarea = "TEXTAREA" == this.win[0].nodeName, this.forcescreen = !1, this.canshowonmouseevent = "scroll" != M.autohidemode, this.onmousedown = !1, this.onmouseup = !1, this.onmousemove = !1, this.onmousewheel = !1, this.onkeypress = !1, this.ongesturezoom = !1, this.onclick = !1, this.onscrollstart = !1, this.onscrollend = !1, this.onscrollcancel = !1, this.onzoomin = !1, this.onzoomout = !1, this.view = !1, this.page = !1, this.scroll = {
                        x: 0,
                        y: 0
                    }, this.scrollratio = {
                        x: 0,
                        y: 0
                    }, this.cursorheight = 20, this.scrollvaluemax = 0, "auto" == M.rtlmode) {
                        var C = this.win[0] == a ? this.body : this.win,
                            N = C.css("writing-mode") || C.css("-webkit-writing-mode") || C.css("-ms-writing-mode") || C.css("-moz-writing-mode");
                        "horizontal-tb" == N || "lr-tb" == N || "" === N ? (this.isrtlmode = "rtl" == C.css("direction"), this.isvertical = !1) : (this.isrtlmode = "vertical-rl" == N || "tb" == N || "tb-rl" == N || "rl-tb" == N, this.isvertical = "vertical-rl" == N || "tb" == N || "tb-rl" == N)
                    } else this.isrtlmode = !0 === M.rtlmode, this.isvertical = !1;
                    if (this.scrollrunning = !1, this.scrollmom = !1, this.observer = !1, this.observerremover = !1, this.observerbody = !1, !1 !== M.scrollbarid) this.id = M.scrollbarid;
                    else
                        do {
                            this.id = "ascrail" + i++
                        } while (l.getElementById(this.id));
                    this.rail = !1, this.cursor = !1, this.cursorfreezed = !1, this.selectiondrag = !1, this.zoom = !1, this.zoomactive = !1, this.hasfocus = !1, this.hasmousefocus = !1, this.railslocked = !1, this.locked = !1, this.hidden = !1, this.cursoractive = !0, this.wheelprevented = !1, this.overflowx = M.overflowx, this.overflowy = M.overflowy, this.nativescrollingarea = !1, this.checkarea = 0, this.events = [], this.saved = {}, this.delaylist = {}, this.synclist = {}, this.lastdeltax = 0, this.lastdeltay = 0, this.detected = w();
                    var P = n.extend({}, this.detected);
                    this.canhwscroll = P.hastransform && M.hwacceleration, this.ishwscroll = this.canhwscroll && T.haswrapper, this.isrtlmode ? this.isvertical ? this.hasreversehr = !(P.iswebkit || P.isie || P.isie11) : this.hasreversehr = !(P.iswebkit || P.isie && !P.isie10 && !P.isie11) : this.hasreversehr = !1, this.istouchcapable = !1, P.cantouch || !P.hasw3ctouch && !P.hasmstouch ? !P.cantouch || P.isios || P.isandroid || !P.iswebkit && !P.ismozilla || (this.istouchcapable = !0) : this.istouchcapable = !0, M.enablemouselockapi || (P.hasmousecapture = !1, P.haspointerlock = !1), this.debounced = function (e, o, t) {
                        T && (T.delaylist[e] || !1 || (T.delaylist[e] = {
                            h: u(function () {
                                T.delaylist[e].fn.call(T), T.delaylist[e] = !1
                            }, t)
                        }, o.call(T)), T.delaylist[e].fn = o)
                    }, this.synched = function (e, o) {
                        T.synclist[e] ? T.synclist[e] = o : (T.synclist[e] = o, u(function () {
                            T && (T.synclist[e] && T.synclist[e].call(T), T.synclist[e] = null)
                        }))
                    }, this.unsynched = function (e) {
                        T.synclist[e] && (T.synclist[e] = !1)
                    }, this.css = function (e, o) {
                        for (var t in o) T.saved.css.push([e, t, e.css(t)]), e.css(t, o[t])
                    }, this.scrollTop = function (e) {
                        return void 0 === e ? T.getScrollTop() : T.setScrollTop(e)
                    }, this.scrollLeft = function (e) {
                        return void 0 === e ? T.getScrollLeft() : T.setScrollLeft(e)
                    };
                    var R = function (e, o, t, r, i, s, n) {
                        this.st = e, this.ed = o, this.spd = t, this.p1 = r || 0, this.p2 = i || 1, this.p3 = s || 0, this.p4 = n || 1, this.ts = f(), this.df = o - e
                    };
                    if (R.prototype = {
                        B2: function (e) {
                            return 3 * (1 - e) * (1 - e) * e
                        },
                        B3: function (e) {
                            return 3 * (1 - e) * e * e
                        },
                        B4: function (e) {
                            return e * e * e
                        },
                        getPos: function () {
                            return (f() - this.ts) / this.spd
                        },
                        getNow: function () {
                            var e = (f() - this.ts) / this.spd,
                                o = this.B2(e) + this.B3(e) + this.B4(e);
                            return e >= 1 ? this.ed : this.st + this.df * o | 0
                        },
                        update: function (e, o) {
                            return this.st = this.getNow(), this.ed = e, this.spd = o, this.ts = f(), this.df = this.ed - this.st, this
                        }
                    }, this.ishwscroll) {
                        this.doc.translate = {
                            x: 0,
                            y: 0,
                            tx: "0px",
                            ty: "0px"
                        }, P.hastranslate3d && P.isios && this.doc.css("-webkit-backface-visibility", "hidden"), this.getScrollTop = function (e) {
                            if (!e) {
                                var o = v();
                                if (o) return 16 == o.length ? -o[13] : -o[5];
                                if (T.timerscroll && T.timerscroll.bz) return T.timerscroll.bz.getNow()
                            }
                            return T.doc.translate.y
                        }, this.getScrollLeft = function (e) {
                            if (!e) {
                                var o = v();
                                if (o) return 16 == o.length ? -o[12] : -o[4];
                                if (T.timerscroll && T.timerscroll.bh) return T.timerscroll.bh.getNow()
                            }
                            return T.doc.translate.x
                        }, this.notifyScrollEvent = function (e) {
                            var o = l.createEvent("UIEvents");
                            o.initUIEvent("scroll", !1, !1, a, 1), o.niceevent = !0, e.dispatchEvent(o)
                        };
                        var _ = this.isrtlmode ? 1 : -1;
                        P.hastranslate3d && M.enabletranslate3d ? (this.setScrollTop = function (e, o) {
                            T.doc.translate.y = e, T.doc.translate.ty = -1 * e + "px", T.doc.css(P.trstyle, "translate3d(" + T.doc.translate.tx + "," + T.doc.translate.ty + ",0)"), o || T.notifyScrollEvent(T.win[0])
                        }, this.setScrollLeft = function (e, o) {
                            T.doc.translate.x = e, T.doc.translate.tx = e * _ + "px", T.doc.css(P.trstyle, "translate3d(" + T.doc.translate.tx + "," + T.doc.translate.ty + ",0)"), o || T.notifyScrollEvent(T.win[0])
                        }) : (this.setScrollTop = function (e, o) {
                            T.doc.translate.y = e, T.doc.translate.ty = -1 * e + "px", T.doc.css(P.trstyle, "translate(" + T.doc.translate.tx + "," + T.doc.translate.ty + ")"), o || T.notifyScrollEvent(T.win[0])
                        }, this.setScrollLeft = function (e, o) {
                            T.doc.translate.x = e, T.doc.translate.tx = e * _ + "px", T.doc.css(P.trstyle, "translate(" + T.doc.translate.tx + "," + T.doc.translate.ty + ")"), o || T.notifyScrollEvent(T.win[0])
                        })
                    } else this.getScrollTop = function () {
                        return T.docscroll.scrollTop()
                    }, this.setScrollTop = function (e) {
                        T.docscroll.scrollTop(e)
                    }, this.getScrollLeft = function () {
                        return T.hasreversehr ? T.detected.ismozilla ? T.page.maxw - Math.abs(T.docscroll.scrollLeft()) : T.page.maxw - T.docscroll.scrollLeft() : T.docscroll.scrollLeft()
                    }, this.setScrollLeft = function (e) {
                        return setTimeout(function () {
                            if (T) return T.hasreversehr && (e = T.detected.ismozilla ? -(T.page.maxw - e) : T.page.maxw - e), T.docscroll.scrollLeft(e)
                        }, 1)
                    };
                    this.getTarget = function (e) {
                        return !!e && (e.target ? e.target : !!e.srcElement && e.srcElement)
                    }, this.hasParent = function (e, o) {
                        if (!e) return !1;
                        for (var t = e.target || e.srcElement || e || !1; t && t.id != o;) t = t.parentNode || !1;
                        return !1 !== t
                    };
                    var I = {thin: 1, medium: 3, thick: 5};
                    this.getDocumentScrollOffset = function () {
                        return {
                            top: a.pageYOffset || l.documentElement.scrollTop,
                            left: a.pageXOffset || l.documentElement.scrollLeft
                        }
                    }, this.getOffset = function () {
                        if (T.isfixed) {
                            var e = T.win.offset(),
                                o = T.getDocumentScrollOffset();
                            return e.top -= o.top, e.left -= o.left, e
                        }
                        var t = T.win.offset();
                        if (!T.viewport) return t;
                        var r = T.viewport.offset();
                        return {top: t.top - r.top, left: t.left - r.left}
                    }, this.updateScrollBar = function (e) {
                        var o, t;
                        if (T.ishwscroll) T.rail.css({height: T.win.innerHeight() - (M.railpadding.top + M.railpadding.bottom)}), T.railh && T.railh.css({width: T.win.innerWidth() - (M.railpadding.left + M.railpadding.right)});
                        else {
                            var r = T.getOffset();
                            if (o = {
                                top: r.top,
                                left: r.left - (M.railpadding.left + M.railpadding.right)
                            }, o.top += x(T.win, "border-top-width", !0), o.left += T.rail.align ? T.win.outerWidth() - x(T.win, "border-right-width") - T.rail.width : x(T.win, "border-left-width"), (t = M.railoffset) && (t.top && (o.top += t.top), t.left && (o.left += t.left)), T.railslocked || T.rail.css({
                                top: o.top,
                                left: o.left,
                                height: (e ? e.h : T.win.innerHeight()) - (M.railpadding.top + M.railpadding.bottom)
                            }), T.zoom && T.zoom.css({
                                top: o.top + 1,
                                left: 1 == T.rail.align ? o.left - 20 : o.left + T.rail.width + 4
                            }), T.railh && !T.railslocked) {
                                o = {
                                    top: r.top,
                                    left: r.left
                                }, (t = M.railhoffset) && (t.top && (o.top += t.top), t.left && (o.left += t.left));
                                var i = T.railh.align ? o.top + x(T.win, "border-top-width", !0) + T.win.innerHeight() - T.railh.height : o.top + x(T.win, "border-top-width", !0),
                                    s = o.left + x(T.win, "border-left-width");
                                T.railh.css({
                                    top: i - (M.railpadding.top + M.railpadding.bottom),
                                    left: s,
                                    width: T.railh.width
                                })
                            }
                        }
                    }, this.doRailClick = function (e, o, t) {
                        var r, i, s, n;
                        T.railslocked || (T.cancelEvent(e), "pageY" in e || (e.pageX = e.clientX + l.documentElement.scrollLeft, e.pageY = e.clientY + l.documentElement.scrollTop), o ? (r = t ? T.doScrollLeft : T.doScrollTop, s = t ? (e.pageX - T.railh.offset().left - T.cursorwidth / 2) * T.scrollratio.x : (e.pageY - T.rail.offset().top - T.cursorheight / 2) * T.scrollratio.y, T.unsynched("relativexy"), r(0 | s)) : (r = t ? T.doScrollLeftBy : T.doScrollBy, s = t ? T.scroll.x : T.scroll.y, n = t ? e.pageX - T.railh.offset().left : e.pageY - T.rail.offset().top, i = t ? T.view.w : T.view.h, r(s >= n ? i : -i)))
                    }, T.newscrolly = T.newscrollx = 0, T.hasanimationframe = "requestAnimationFrame" in a, T.hascancelanimationframe = "cancelAnimationFrame" in a, T.hasborderbox = !1, this.init = function () {
                        if (T.saved.css = [], P.isoperamini) return !0;
                        if (P.isandroid && !("hidden" in l)) return !0;
                        M.emulatetouch = M.emulatetouch || M.touchbehavior, T.hasborderbox = a.getComputedStyle && "border-box" === a.getComputedStyle(l.body)["box-sizing"];
                        var e = {"overflow-y": "hidden"};
                        if ((P.isie11 || P.isie10) && (e["-ms-overflow-style"] = "none"), T.ishwscroll && (this.doc.css(P.transitionstyle, P.prefixstyle + "transform 0ms ease-out"), P.transitionend && T.bind(T.doc, P.transitionend, T.onScrollTransitionEnd, !1)), T.zindex = "auto", T.ispage || "auto" != M.zindex ? T.zindex = M.zindex : T.zindex = b() || "auto", !T.ispage && "auto" != T.zindex && T.zindex > s && (s = T.zindex), T.isie && 0 === T.zindex && "auto" == M.zindex && (T.zindex = "auto"), !T.ispage || !P.isieold) {
                            var i = T.docscroll;
                            T.ispage && (i = T.haswrapper ? T.win : T.doc), T.css(i, e), T.ispage && (P.isie11 || P.isie) && T.css(n("html"), e), !P.isios || T.ispage || T.haswrapper || T.css(E, {"-webkit-overflow-scrolling": "touch"});
                            var d = n(l.createElement("div"));
                            d.css({
                                position: "relative",
                                top: 0,
                                float: "right",
                                width: M.cursorwidth,
                                height: 0,
                                "background-color": M.cursorcolor,
                                border: M.cursorborder,
                                "background-clip": "padding-box",
                                "-webkit-border-radius": M.cursorborderradius,
                                "-moz-border-radius": M.cursorborderradius,
                                "border-radius": M.cursorborderradius
                            }), d.addClass("nicescroll-cursors"), T.cursor = d;
                            var u = n(l.createElement("div"));
                            u.attr("id", T.id), u.addClass("nicescroll-rails nicescroll-rails-vr");
                            var h, p, f = ["left", "right", "top", "bottom"];
                            for (var g in f) p = f[g], (h = M.railpadding[p] || 0) && u.css("padding-" + p, h + "px");
                            u.append(d), u.width = Math.max(parseFloat(M.cursorwidth), d.outerWidth()), u.css({
                                width: u.width + "px",
                                zIndex: T.zindex,
                                background: M.background,
                                cursor: "default"
                            }), u.visibility = !0, u.scrollable = !0, u.align = "left" == M.railalign ? 0 : 1, T.rail = u, T.rail.drag = !1;
                            var v = !1;
                            !M.boxzoom || T.ispage || P.isieold || (v = l.createElement("div"), T.bind(v, "click", T.doZoom), T.bind(v, "mouseenter", function () {
                                T.zoom.css("opacity", M.cursoropacitymax)
                            }), T.bind(v, "mouseleave", function () {
                                T.zoom.css("opacity", M.cursoropacitymin)
                            }), T.zoom = n(v), T.zoom.css({
                                cursor: "pointer",
                                zIndex: T.zindex,
                                height: 18,
                                width: 18,
                                backgroundPosition: "0 0"
                            }), M.dblclickzoom && T.bind(T.win, "dblclick", T.doZoom), P.cantouch && M.gesturezoom && (T.ongesturezoom = function (e) {
                                return e.scale > 1.5 && T.doZoomIn(e), e.scale < .8 && T.doZoomOut(e), T.cancelEvent(e)
                            }, T.bind(T.win, "gestureend", T.ongesturezoom))), T.railh = !1;
                            var w;
                            if (M.horizrailenabled && (T.css(i, {overflowX: "hidden"}), (d = n(l.createElement("div"))).css({
                                position: "absolute",
                                top: 0,
                                height: M.cursorwidth,
                                width: 0,
                                backgroundColor: M.cursorcolor,
                                border: M.cursorborder,
                                backgroundClip: "padding-box",
                                "-webkit-border-radius": M.cursorborderradius,
                                "-moz-border-radius": M.cursorborderradius,
                                "border-radius": M.cursorborderradius
                            }), P.isieold && d.css("overflow", "hidden"), d.addClass("nicescroll-cursors"), T.cursorh = d, (w = n(l.createElement("div"))).attr("id", T.id + "-hr"), w.addClass("nicescroll-rails nicescroll-rails-hr"), w.height = Math.max(parseFloat(M.cursorwidth), d.outerHeight()), w.css({
                                height: w.height + "px",
                                zIndex: T.zindex,
                                background: M.background
                            }), w.append(d), w.visibility = !0, w.scrollable = !0, w.align = "top" == M.railvalign ? 0 : 1, T.railh = w, T.railh.drag = !1), T.ispage) u.css({
                                position: "fixed",
                                top: 0,
                                height: "100%"
                            }), u.css(u.align ? {right: 0} : {left: 0}), T.body.append(u), T.railh && (w.css({
                                position: "fixed",
                                left: 0,
                                width: "100%"
                            }), w.css(w.align ? {bottom: 0} : {top: 0}), T.body.append(w));
                            else {
                                if (T.ishwscroll) {
                                    "static" == T.win.css("position") && T.css(T.win, {position: "relative"});
                                    var x = "HTML" == T.win[0].nodeName ? T.body : T.win;
                                    n(x).scrollTop(0).scrollLeft(0), T.zoom && (T.zoom.css({
                                        position: "absolute",
                                        top: 1,
                                        right: 0,
                                        "margin-right": u.width + 4
                                    }), x.append(T.zoom)), u.css({
                                        position: "absolute",
                                        top: 0
                                    }), u.css(u.align ? {right: 0} : {left: 0}), x.append(u), w && (w.css({
                                        position: "absolute",
                                        left: 0,
                                        bottom: 0
                                    }), w.css(w.align ? {bottom: 0} : {top: 0}), x.append(w))
                                } else {
                                    T.isfixed = "fixed" == T.win.css("position");
                                    var S = T.isfixed ? "fixed" : "absolute";
                                    T.isfixed || (T.viewport = T.getViewport(T.win[0])), T.viewport && (T.body = T.viewport, /fixed|absolute/.test(T.viewport.css("position")) || T.css(T.viewport, {position: "relative"})), u.css({position: S}), T.zoom && T.zoom.css({position: S}), T.updateScrollBar(), T.body.append(u), T.zoom && T.body.append(T.zoom), T.railh && (w.css({position: S}), T.body.append(w))
                                }
                                P.isios && T.css(T.win, {
                                    "-webkit-tap-highlight-color": "rgba(0,0,0,0)",
                                    "-webkit-touch-callout": "none"
                                }), M.disableoutline && (P.isie && T.win.attr("hideFocus", "true"), P.iswebkit && T.win.css("outline", "none"))
                            }
                            if (!1 === M.autohidemode ? (T.autohidedom = !1, T.rail.css({opacity: M.cursoropacitymax}), T.railh && T.railh.css({opacity: M.cursoropacitymax})) : !0 === M.autohidemode || "leave" === M.autohidemode ? (T.autohidedom = n().add(T.rail), P.isie8 && (T.autohidedom = T.autohidedom.add(T.cursor)), T.railh && (T.autohidedom = T.autohidedom.add(T.railh)), T.railh && P.isie8 && (T.autohidedom = T.autohidedom.add(T.cursorh))) : "scroll" == M.autohidemode ? (T.autohidedom = n().add(T.rail), T.railh && (T.autohidedom = T.autohidedom.add(T.railh))) : "cursor" == M.autohidemode ? (T.autohidedom = n().add(T.cursor), T.railh && (T.autohidedom = T.autohidedom.add(T.cursorh))) : "hidden" == M.autohidemode && (T.autohidedom = !1, T.hide(), T.railslocked = !1), P.cantouch || T.istouchcapable || M.emulatetouch || P.hasmstouch) {
                                T.scrollmom = new y(T);
                                T.ontouchstart = function (e) {
                                    if (T.locked) return !1;
                                    if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                    if (T.hasmoving = !1, T.scrollmom.timer && (T.triggerScrollEnd(), T.scrollmom.stop()), !T.railslocked) {
                                        var o = T.getTarget(e);
                                        if (o && /INPUT/i.test(o.nodeName) && /range/i.test(o.type)) return T.stopPropagation(e);
                                        var t = "mousedown" === e.type;
                                        if (!("clientX" in e) && "changedTouches" in e && (e.clientX = e.changedTouches[0].clientX, e.clientY = e.changedTouches[0].clientY), T.forcescreen) {
                                            var r = e;
                                            (e = {original: e.original ? e.original : e}).clientX = r.screenX, e.clientY = r.screenY
                                        }
                                        if (T.rail.drag = {
                                            x: e.clientX,
                                            y: e.clientY,
                                            sx: T.scroll.x,
                                            sy: T.scroll.y,
                                            st: T.getScrollTop(),
                                            sl: T.getScrollLeft(),
                                            pt: 2,
                                            dl: !1,
                                            tg: o
                                        }, T.ispage || !M.directionlockdeadzone) T.rail.drag.dl = "f";
                                        else {
                                            var i = {w: c.width(), h: c.height()},
                                                s = T.getContentSize(),
                                                l = s.h - i.h,
                                                a = s.w - i.w;
                                            T.rail.scrollable && !T.railh.scrollable ? T.rail.drag.ck = l > 0 && "v" : !T.rail.scrollable && T.railh.scrollable ? T.rail.drag.ck = a > 0 && "h" : T.rail.drag.ck = !1
                                        }
                                        if (M.emulatetouch && T.isiframe && P.isie) {
                                            var d = T.win.position();
                                            T.rail.drag.x += d.left, T.rail.drag.y += d.top
                                        }
                                        if (T.hasmoving = !1, T.lastmouseup = !1, T.scrollmom.reset(e.clientX, e.clientY), o && t) {
                                            if (!/INPUT|SELECT|BUTTON|TEXTAREA/i.test(o.nodeName)) return P.hasmousecapture && o.setCapture(), M.emulatetouch ? (o.onclick && !o._onclick && (o._onclick = o.onclick, o.onclick = function (e) {
                                                if (T.hasmoving) return !1;
                                                o._onclick.call(this, e)
                                            }), T.cancelEvent(e)) : T.stopPropagation(e);
                                            /SUBMIT|CANCEL|BUTTON/i.test(n(o).attr("type")) && (T.preventclick = {
                                                tg: o,
                                                click: !1
                                            })
                                        }
                                    }
                                }, T.ontouchend = function (e) {
                                    if (!T.rail.drag) return !0;
                                    if (2 == T.rail.drag.pt) {
                                        if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !1;
                                        T.rail.drag = !1;
                                        var o = "mouseup" === e.type;
                                        if (T.hasmoving && (T.scrollmom.doMomentum(), T.lastmouseup = !0, T.hideCursor(), P.hasmousecapture && l.releaseCapture(), o)) return T.cancelEvent(e)
                                    } else if (1 == T.rail.drag.pt) return T.onmouseup(e)
                                };
                                var z = M.emulatetouch && T.isiframe && !P.hasmousecapture,
                                    k = .3 * M.directionlockdeadzone | 0;
                                T.ontouchmove = function (e, o) {
                                    if (!T.rail.drag) return !0;
                                    if (e.targetTouches && M.preventmultitouchscrolling && e.targetTouches.length > 1) return !0;
                                    if (e.pointerType && ("mouse" === e.pointerType || e.pointerType === e.MSPOINTER_TYPE_MOUSE)) return !0;
                                    if (2 == T.rail.drag.pt) {
                                        "changedTouches" in e && (e.clientX = e.changedTouches[0].clientX, e.clientY = e.changedTouches[0].clientY);
                                        var t, r;
                                        if (r = t = 0, z && !o) {
                                            var i = T.win.position();
                                            r = -i.left, t = -i.top
                                        }
                                        var s = e.clientY + t,
                                            n = s - T.rail.drag.y,
                                            a = e.clientX + r,
                                            c = a - T.rail.drag.x,
                                            d = T.rail.drag.st - n;
                                        if (T.ishwscroll && M.bouncescroll) d < 0 ? d = Math.round(d / 2) : d > T.page.maxh && (d = T.page.maxh + Math.round((d - T.page.maxh) / 2));
                                        else if (d < 0 ? (d = 0, s = 0) : d > T.page.maxh && (d = T.page.maxh, s = 0), 0 === s && !T.hasmoving) return T.ispage || (T.rail.drag = !1), !0;
                                        var u = T.getScrollLeft();
                                        if (T.railh && T.railh.scrollable && (u = T.isrtlmode ? c - T.rail.drag.sl : T.rail.drag.sl - c, T.ishwscroll && M.bouncescroll ? u < 0 ? u = Math.round(u / 2) : u > T.page.maxw && (u = T.page.maxw + Math.round((u - T.page.maxw) / 2)) : (u < 0 && (u = 0, a = 0), u > T.page.maxw && (u = T.page.maxw, a = 0))), !T.hasmoving) {
                                            if (T.rail.drag.y === e.clientY && T.rail.drag.x === e.clientX) return T.cancelEvent(e);
                                            var h = Math.abs(n),
                                                p = Math.abs(c),
                                                m = M.directionlockdeadzone;
                                            if (T.rail.drag.ck ? "v" == T.rail.drag.ck ? p > m && h <= k ? T.rail.drag = !1 : h > m && (T.rail.drag.dl = "v") : "h" == T.rail.drag.ck && (h > m && p <= k ? T.rail.drag = !1 : p > m && (T.rail.drag.dl = "h")) : h > m && p > m ? T.rail.drag.dl = "f" : h > m ? T.rail.drag.dl = p > k ? "f" : "v" : p > m && (T.rail.drag.dl = h > k ? "f" : "h"), !T.rail.drag.dl) return T.cancelEvent(e);
                                            T.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), T.hasmoving = !0
                                        }
                                        return T.preventclick && !T.preventclick.click && (T.preventclick.click = T.preventclick.tg.onclick || !1, T.preventclick.tg.onclick = T.onpreventclick), T.rail.drag.dl && ("v" == T.rail.drag.dl ? u = T.rail.drag.sl : "h" == T.rail.drag.dl && (d = T.rail.drag.st)), T.synched("touchmove", function () {
                                            T.rail.drag && 2 == T.rail.drag.pt && (T.prepareTransition && T.resetTransition(), T.rail.scrollable && T.setScrollTop(d), T.scrollmom.update(a, s), T.railh && T.railh.scrollable ? (T.setScrollLeft(u), T.showCursor(d, u)) : T.showCursor(d), P.isie10 && l.selection.clear())
                                        }), T.cancelEvent(e)
                                    }
                                    return 1 == T.rail.drag.pt ? T.onmousemove(e) : void 0
                                }, T.ontouchstartCursor = function (e, o) {
                                    if (!T.rail.drag || 3 == T.rail.drag.pt) {
                                        if (T.locked) return T.cancelEvent(e);
                                        T.cancelScroll(), T.rail.drag = {
                                            x: e.touches[0].clientX,
                                            y: e.touches[0].clientY,
                                            sx: T.scroll.x,
                                            sy: T.scroll.y,
                                            pt: 3,
                                            hr: !!o
                                        };
                                        var t = T.getTarget(e);
                                        return !T.ispage && P.hasmousecapture && t.setCapture(), T.isiframe && !P.hasmousecapture && (T.saved.csspointerevents = T.doc.css("pointer-events"), T.css(T.doc, {"pointer-events": "none"})), T.cancelEvent(e)
                                    }
                                }, T.ontouchendCursor = function (e) {
                                    if (T.rail.drag) {
                                        if (P.hasmousecapture && l.releaseCapture(), T.isiframe && !P.hasmousecapture && T.doc.css("pointer-events", T.saved.csspointerevents), 3 != T.rail.drag.pt) return;
                                        return T.rail.drag = !1, T.cancelEvent(e)
                                    }
                                }, T.ontouchmoveCursor = function (e) {
                                    if (T.rail.drag) {
                                        if (3 != T.rail.drag.pt) return;
                                        if (T.cursorfreezed = !0, T.rail.drag.hr) {
                                            T.scroll.x = T.rail.drag.sx + (e.touches[0].clientX - T.rail.drag.x), T.scroll.x < 0 && (T.scroll.x = 0);
                                            var o = T.scrollvaluemaxw;
                                            T.scroll.x > o && (T.scroll.x = o)
                                        } else {
                                            T.scroll.y = T.rail.drag.sy + (e.touches[0].clientY - T.rail.drag.y), T.scroll.y < 0 && (T.scroll.y = 0);
                                            var t = T.scrollvaluemax;
                                            T.scroll.y > t && (T.scroll.y = t)
                                        }
                                        return T.synched("touchmove", function () {
                                            T.rail.drag && 3 == T.rail.drag.pt && (T.showCursor(), T.rail.drag.hr ? T.doScrollLeft(Math.round(T.scroll.x * T.scrollratio.x), M.cursordragspeed) : T.doScrollTop(Math.round(T.scroll.y * T.scrollratio.y), M.cursordragspeed))
                                        }), T.cancelEvent(e)
                                    }
                                }
                            }
                            if (T.onmousedown = function (e, o) {
                                if (!T.rail.drag || 1 == T.rail.drag.pt) {
                                    if (T.railslocked) return T.cancelEvent(e);
                                    T.cancelScroll(), T.rail.drag = {
                                        x: e.clientX,
                                        y: e.clientY,
                                        sx: T.scroll.x,
                                        sy: T.scroll.y,
                                        pt: 1,
                                        hr: o || !1
                                    };
                                    var t = T.getTarget(e);
                                    return P.hasmousecapture && t.setCapture(), T.isiframe && !P.hasmousecapture && (T.saved.csspointerevents = T.doc.css("pointer-events"), T.css(T.doc, {"pointer-events": "none"})), T.hasmoving = !1, T.cancelEvent(e)
                                }
                            }, T.onmouseup = function (e) {
                                if (T.rail.drag) return 1 != T.rail.drag.pt || (P.hasmousecapture && l.releaseCapture(), T.isiframe && !P.hasmousecapture && T.doc.css("pointer-events", T.saved.csspointerevents), T.rail.drag = !1, T.cursorfreezed = !1, T.hasmoving && T.triggerScrollEnd(), T.cancelEvent(e))
                            }, T.onmousemove = function (e) {
                                if (T.rail.drag) {
                                    if (1 !== T.rail.drag.pt) return;
                                    if (P.ischrome && 0 === e.which) return T.onmouseup(e);
                                    if (T.cursorfreezed = !0, T.hasmoving || T.triggerScrollStart(e.clientX, e.clientY, 0, 0, 0), T.hasmoving = !0, T.rail.drag.hr) {
                                        T.scroll.x = T.rail.drag.sx + (e.clientX - T.rail.drag.x), T.scroll.x < 0 && (T.scroll.x = 0);
                                        var o = T.scrollvaluemaxw;
                                        T.scroll.x > o && (T.scroll.x = o)
                                    } else {
                                        T.scroll.y = T.rail.drag.sy + (e.clientY - T.rail.drag.y), T.scroll.y < 0 && (T.scroll.y = 0);
                                        var t = T.scrollvaluemax;
                                        T.scroll.y > t && (T.scroll.y = t)
                                    }
                                    return T.synched("mousemove", function () {
                                        T.cursorfreezed && (T.showCursor(), T.rail.drag.hr ? T.scrollLeft(Math.round(T.scroll.x * T.scrollratio.x)) : T.scrollTop(Math.round(T.scroll.y * T.scrollratio.y)))
                                    }), T.cancelEvent(e)
                                }
                                T.checkarea = 0
                            }, P.cantouch || M.emulatetouch) T.onpreventclick = function (e) {
                                if (T.preventclick) return T.preventclick.tg.onclick = T.preventclick.click, T.preventclick = !1, T.cancelEvent(e)
                            }, T.onclick = !P.isios && function (e) {
                                return !T.lastmouseup || (T.lastmouseup = !1, T.cancelEvent(e))
                            }, M.grabcursorenabled && P.cursorgrabvalue && (T.css(T.ispage ? T.doc : T.win, {cursor: P.cursorgrabvalue}), T.css(T.rail, {cursor: P.cursorgrabvalue}));
                            else {
                                var L = function (e) {
                                    if (T.selectiondrag) {
                                        if (e) {
                                            var o = T.win.outerHeight(),
                                                t = e.pageY - T.selectiondrag.top;
                                            t > 0 && t < o && (t = 0), t >= o && (t -= o), T.selectiondrag.df = t
                                        }
                                        if (0 !== T.selectiondrag.df) {
                                            var r = -2 * T.selectiondrag.df / 6 | 0;
                                            T.doScrollBy(r), T.debounced("doselectionscroll", function () {
                                                L()
                                            }, 50)
                                        }
                                    }
                                };
                                T.hasTextSelected = "getSelection" in l ? function () {
                                    return l.getSelection().rangeCount > 0
                                } : "selection" in l ? function () {
                                    return "None" != l.selection.type
                                } : function () {
                                    return !1
                                }, T.onselectionstart = function (e) {
                                    T.ispage || (T.selectiondrag = T.win.offset())
                                }, T.onselectionend = function (e) {
                                    T.selectiondrag = !1
                                }, T.onselectiondrag = function (e) {
                                    T.selectiondrag && T.hasTextSelected() && T.debounced("selectionscroll", function () {
                                        L(e)
                                    }, 250)
                                }
                            }
                            if (P.hasw3ctouch ? (T.css(T.ispage ? n("html") : T.win, {"touch-action": "none"}), T.css(T.rail, {"touch-action": "none"}), T.css(T.cursor, {"touch-action": "none"}), T.bind(T.win, "pointerdown", T.ontouchstart), T.bind(l, "pointerup", T.ontouchend), T.delegate(l, "pointermove", T.ontouchmove)) : P.hasmstouch ? (T.css(T.ispage ? n("html") : T.win, {"-ms-touch-action": "none"}), T.css(T.rail, {"-ms-touch-action": "none"}), T.css(T.cursor, {"-ms-touch-action": "none"}), T.bind(T.win, "MSPointerDown", T.ontouchstart), T.bind(l, "MSPointerUp", T.ontouchend), T.delegate(l, "MSPointerMove", T.ontouchmove), T.bind(T.cursor, "MSGestureHold", function (e) {
                                e.preventDefault()
                            }), T.bind(T.cursor, "contextmenu", function (e) {
                                e.preventDefault()
                            })) : P.cantouch && (T.bind(T.win, "touchstart", T.ontouchstart, !1, !0), T.bind(l, "touchend", T.ontouchend, !1, !0), T.bind(l, "touchcancel", T.ontouchend, !1, !0), T.delegate(l, "touchmove", T.ontouchmove, !1, !0)), M.emulatetouch && (T.bind(T.win, "mousedown", T.ontouchstart, !1, !0), T.bind(l, "mouseup", T.ontouchend, !1, !0), T.bind(l, "mousemove", T.ontouchmove, !1, !0)), (M.cursordragontouch || !P.cantouch && !M.emulatetouch) && (T.rail.css({cursor: "default"}), T.railh && T.railh.css({cursor: "default"}), T.jqbind(T.rail, "mouseenter", function () {
                                if (!T.ispage && !T.win.is(":visible")) return !1;
                                T.canshowonmouseevent && T.showCursor(), T.rail.active = !0
                            }), T.jqbind(T.rail, "mouseleave", function () {
                                T.rail.active = !1, T.rail.drag || T.hideCursor()
                            }), M.sensitiverail && (T.bind(T.rail, "click", function (e) {
                                T.doRailClick(e, !1, !1)
                            }), T.bind(T.rail, "dblclick", function (e) {
                                T.doRailClick(e, !0, !1)
                            }), T.bind(T.cursor, "click", function (e) {
                                T.cancelEvent(e)
                            }), T.bind(T.cursor, "dblclick", function (e) {
                                T.cancelEvent(e)
                            })), T.railh && (T.jqbind(T.railh, "mouseenter", function () {
                                if (!T.ispage && !T.win.is(":visible")) return !1;
                                T.canshowonmouseevent && T.showCursor(), T.rail.active = !0
                            }), T.jqbind(T.railh, "mouseleave", function () {
                                T.rail.active = !1, T.rail.drag || T.hideCursor()
                            }), M.sensitiverail && (T.bind(T.railh, "click", function (e) {
                                T.doRailClick(e, !1, !0)
                            }), T.bind(T.railh, "dblclick", function (e) {
                                T.doRailClick(e, !0, !0)
                            }), T.bind(T.cursorh, "click", function (e) {
                                T.cancelEvent(e)
                            }), T.bind(T.cursorh, "dblclick", function (e) {
                                T.cancelEvent(e)
                            })))), M.cursordragontouch && (this.istouchcapable || P.cantouch) && (T.bind(T.cursor, "touchstart", T.ontouchstartCursor), T.bind(T.cursor, "touchmove", T.ontouchmoveCursor), T.bind(T.cursor, "touchend", T.ontouchendCursor), T.cursorh && T.bind(T.cursorh, "touchstart", function (e) {
                                T.ontouchstartCursor(e, !0)
                            }), T.cursorh && T.bind(T.cursorh, "touchmove", T.ontouchmoveCursor), T.cursorh && T.bind(T.cursorh, "touchend", T.ontouchendCursor)), M.emulatetouch || P.isandroid || P.isios ? (T.bind(P.hasmousecapture ? T.win : l, "mouseup", T.ontouchend), T.onclick && T.bind(l, "click", T.onclick), M.cursordragontouch ? (T.bind(T.cursor, "mousedown", T.onmousedown), T.bind(T.cursor, "mouseup", T.onmouseup), T.cursorh && T.bind(T.cursorh, "mousedown", function (e) {
                                T.onmousedown(e, !0)
                            }), T.cursorh && T.bind(T.cursorh, "mouseup", T.onmouseup)) : (T.bind(T.rail, "mousedown", function (e) {
                                e.preventDefault()
                            }), T.railh && T.bind(T.railh, "mousedown", function (e) {
                                e.preventDefault()
                            }))) : (T.bind(P.hasmousecapture ? T.win : l, "mouseup", T.onmouseup), T.bind(l, "mousemove", T.onmousemove), T.onclick && T.bind(l, "click", T.onclick), T.bind(T.cursor, "mousedown", T.onmousedown), T.bind(T.cursor, "mouseup", T.onmouseup), T.railh && (T.bind(T.cursorh, "mousedown", function (e) {
                                T.onmousedown(e, !0)
                            }), T.bind(T.cursorh, "mouseup", T.onmouseup)), !T.ispage && M.enablescrollonselection && (T.bind(T.win[0], "mousedown", T.onselectionstart), T.bind(l, "mouseup", T.onselectionend), T.bind(T.cursor, "mouseup", T.onselectionend), T.cursorh && T.bind(T.cursorh, "mouseup", T.onselectionend), T.bind(l, "mousemove", T.onselectiondrag)), T.zoom && (T.jqbind(T.zoom, "mouseenter", function () {
                                T.canshowonmouseevent && T.showCursor(), T.rail.active = !0
                            }), T.jqbind(T.zoom, "mouseleave", function () {
                                T.rail.active = !1, T.rail.drag || T.hideCursor()
                            }))), M.enablemousewheel && (T.isiframe || T.mousewheel(P.isie && T.ispage ? l : T.win, T.onmousewheel), T.mousewheel(T.rail, T.onmousewheel), T.railh && T.mousewheel(T.railh, T.onmousewheelhr)), T.ispage || P.cantouch || /HTML|^BODY/.test(T.win[0].nodeName) || (T.win.attr("tabindex") || T.win.attr({tabindex: ++r}), T.bind(T.win, "focus", function (e) {
                                o = T.getTarget(e).id || T.getTarget(e) || !1, T.hasfocus = !0, T.canshowonmouseevent && T.noticeCursor()
                            }), T.bind(T.win, "blur", function (e) {
                                o = !1, T.hasfocus = !1
                            }), T.bind(T.win, "mouseenter", function (e) {
                                t = T.getTarget(e).id || T.getTarget(e) || !1, T.hasmousefocus = !0, T.canshowonmouseevent && T.noticeCursor()
                            }), T.bind(T.win, "mouseleave", function (e) {
                                t = !1, T.hasmousefocus = !1, T.rail.drag || T.hideCursor()
                            })), T.onkeypress = function (e) {
                                if (T.railslocked && 0 === T.page.maxh) return !0;
                                e = e || a.event;
                                var r = T.getTarget(e);
                                if (r && /INPUT|TEXTAREA|SELECT|OPTION/.test(r.nodeName) && (!(r.getAttribute("type") || r.type || !1) || !/submit|button|cancel/i.tp)) return !0;
                                if (n(r).attr("contenteditable")) return !0;
                                if (T.hasfocus || T.hasmousefocus && !o || T.ispage && !o && !t) {
                                    var i = e.keyCode;
                                    if (T.railslocked && 27 != i) return T.cancelEvent(e);
                                    var s = e.ctrlKey || !1,
                                        l = e.shiftKey || !1,
                                        c = !1;
                                    switch (i) {
                                        case 38:
                                        case 63233:
                                            T.doScrollBy(72), c = !0;
                                            break;
                                        case 40:
                                        case 63235:
                                            T.doScrollBy(-72), c = !0;
                                            break;
                                        case 37:
                                        case 63232:
                                            T.railh && (s ? T.doScrollLeft(0) : T.doScrollLeftBy(72), c = !0);
                                            break;
                                        case 39:
                                        case 63234:
                                            T.railh && (s ? T.doScrollLeft(T.page.maxw) : T.doScrollLeftBy(-72), c = !0);
                                            break;
                                        case 33:
                                        case 63276:
                                            T.doScrollBy(T.view.h), c = !0;
                                            break;
                                        case 34:
                                        case 63277:
                                            T.doScrollBy(-T.view.h), c = !0;
                                            break;
                                        case 36:
                                        case 63273:
                                            T.railh && s ? T.doScrollPos(0, 0) : T.doScrollTo(0), c = !0;
                                            break;
                                        case 35:
                                        case 63275:
                                            T.railh && s ? T.doScrollPos(T.page.maxw, T.page.maxh) : T.doScrollTo(T.page.maxh), c = !0;
                                            break;
                                        case 32:
                                            M.spacebarenabled && (l ? T.doScrollBy(T.view.h) : T.doScrollBy(-T.view.h), c = !0);
                                            break;
                                        case 27:
                                            T.zoomactive && (T.doZoom(), c = !0)
                                    }
                                    if (c) return T.cancelEvent(e)
                                }
                            }, M.enablekeyboard && T.bind(l, P.isopera && !P.isopera12 ? "keypress" : "keydown", T.onkeypress), T.bind(l, "keydown", function (e) {
                                (e.ctrlKey || !1) && (T.wheelprevented = !0)
                            }), T.bind(l, "keyup", function (e) {
                                e.ctrlKey || !1 || (T.wheelprevented = !1)
                            }), T.bind(a, "blur", function (e) {
                                T.wheelprevented = !1
                            }), T.bind(a, "resize", T.onscreenresize), T.bind(a, "orientationchange", T.onscreenresize), T.bind(a, "load", T.lazyResize), P.ischrome && !T.ispage && !T.haswrapper) {
                                var C = T.win.attr("style"),
                                    N = parseFloat(T.win.css("width")) + 1;
                                T.win.css("width", N), T.synched("chromefix", function () {
                                    T.win.attr("style", C)
                                })
                            }
                            if (T.onAttributeChange = function (e) {
                                T.lazyResize(T.isieold ? 250 : 30)
                            }, M.enableobserver && (T.isie11 || !1 === m || (T.observerbody = new m(function (e) {
                                if (e.forEach(function (e) {
                                    if ("attributes" == e.type) return E.hasClass("modal-open") && E.hasClass("modal-dialog") && !n.contains(n(".modal-dialog")[0], T.doc[0]) ? T.hide() : T.show()
                                }), T.me.clientWidth != T.page.width || T.me.clientHeight != T.page.height) return T.lazyResize(30)
                            }), T.observerbody.observe(l.body, {
                                childList: !0,
                                subtree: !0,
                                characterData: !1,
                                attributes: !0,
                                attributeFilter: ["class"]
                            })), !T.ispage && !T.haswrapper)) {
                                var R = T.win[0];
                                !1 !== m ? (T.observer = new m(function (e) {
                                    e.forEach(T.onAttributeChange)
                                }), T.observer.observe(R, {
                                    childList: !0,
                                    characterData: !1,
                                    attributes: !0,
                                    subtree: !1
                                }), T.observerremover = new m(function (e) {
                                    e.forEach(function (e) {
                                        if (e.removedNodes.length > 0)
                                            for (var o in e.removedNodes)
                                                if (T && e.removedNodes[o] === R) return T.remove()
                                    })
                                }), T.observerremover.observe(R.parentNode, {
                                    childList: !0,
                                    characterData: !1,
                                    attributes: !1,
                                    subtree: !1
                                })) : (T.bind(R, P.isie && !P.isie9 ? "propertychange" : "DOMAttrModified", T.onAttributeChange), P.isie9 && R.attachEvent("onpropertychange", T.onAttributeChange), T.bind(R, "DOMNodeRemoved", function (e) {
                                    e.target === R && T.remove()
                                }))
                            }
                            !T.ispage && M.boxzoom && T.bind(a, "resize", T.resizeZoom), T.istextarea && (T.bind(T.win, "keydown", T.lazyResize), T.bind(T.win, "mouseup", T.lazyResize)), T.lazyResize(30)
                        }
                        if ("IFRAME" == this.doc[0].nodeName) {
                            var _ = function () {
                                T.iframexd = !1;
                                var o;
                                try {
                                    (o = "contentDocument" in this ? this.contentDocument : this.contentWindow._doc).domain
                                } catch (e) {
                                    T.iframexd = !0, o = !1
                                }
                                if (T.iframexd) return "console" in a && console.log("NiceScroll error: policy restriced iframe"), !0;
                                if (T.forcescreen = !0, T.isiframe && (T.iframe = {
                                    doc: n(o),
                                    html: T.doc.contents().find("html")[0],
                                    body: T.doc.contents().find("body")[0]
                                }, T.getContentSize = function () {
                                    return {
                                        w: Math.max(T.iframe.html.scrollWidth, T.iframe.body.scrollWidth),
                                        h: Math.max(T.iframe.html.scrollHeight, T.iframe.body.scrollHeight)
                                    }
                                }, T.docscroll = n(T.iframe.body)), !P.isios && M.iframeautoresize && !T.isiframe) {
                                    T.win.scrollTop(0), T.doc.height("");
                                    var t = Math.max(o.getElementsByTagName("html")[0].scrollHeight, o.body.scrollHeight);
                                    T.doc.height(t)
                                }
                                T.lazyResize(30), T.css(n(T.iframe.body), e), P.isios && T.haswrapper && T.css(n(o.body), {"-webkit-transform": "translate3d(0,0,0)"}), "contentWindow" in this ? T.bind(this.contentWindow, "scroll", T.onscroll) : T.bind(o, "scroll", T.onscroll), M.enablemousewheel && T.mousewheel(o, T.onmousewheel), M.enablekeyboard && T.bind(o, P.isopera ? "keypress" : "keydown", T.onkeypress), P.cantouch ? (T.bind(o, "touchstart", T.ontouchstart), T.bind(o, "touchmove", T.ontouchmove)) : M.emulatetouch && (T.bind(o, "mousedown", T.ontouchstart), T.bind(o, "mousemove", function (e) {
                                    return T.ontouchmove(e, !0)
                                }), M.grabcursorenabled && P.cursorgrabvalue && T.css(n(o.body), {cursor: P.cursorgrabvalue})), T.bind(o, "mouseup", T.ontouchend), T.zoom && (M.dblclickzoom && T.bind(o, "dblclick", T.doZoom), T.ongesturezoom && T.bind(o, "gestureend", T.ongesturezoom))
                            };
                            this.doc[0].readyState && "complete" === this.doc[0].readyState && setTimeout(function () {
                                _.call(T.doc[0], !1)
                            }, 500), T.bind(this.doc, "load", _)
                        }
                    }, this.showCursor = function (e, o) {
                        if (T.cursortimeout && (clearTimeout(T.cursortimeout), T.cursortimeout = 0), T.rail) {
                            if (T.autohidedom && (T.autohidedom.stop().css({opacity: M.cursoropacitymax}), T.cursoractive = !0), T.rail.drag && 1 == T.rail.drag.pt || (void 0 !== e && !1 !== e && (T.scroll.y = e / T.scrollratio.y | 0), void 0 !== o && (T.scroll.x = o / T.scrollratio.x | 0)), T.cursor.css({
                                height: T.cursorheight,
                                top: T.scroll.y
                            }), T.cursorh) {
                                var t = T.hasreversehr ? T.scrollvaluemaxw - T.scroll.x : T.scroll.x;
                                T.cursorh.css({
                                    width: T.cursorwidth,
                                    left: !T.rail.align && T.rail.visibility ? t + T.rail.width : t
                                }), T.cursoractive = !0
                            }
                            T.zoom && T.zoom.stop().css({opacity: M.cursoropacitymax})
                        }
                    }, this.hideCursor = function (e) {
                        T.cursortimeout || T.rail && T.autohidedom && (T.hasmousefocus && "leave" === M.autohidemode || (T.cursortimeout = setTimeout(function () {
                            T.rail.active && T.showonmouseevent || (T.autohidedom.stop().animate({opacity: M.cursoropacitymin}), T.zoom && T.zoom.stop().animate({opacity: M.cursoropacitymin}), T.cursoractive = !1), T.cursortimeout = 0
                        }, e || M.hidecursordelay)))
                    }, this.noticeCursor = function (e, o, t) {
                        T.showCursor(o, t), T.rail.active || T.hideCursor(e)
                    }, this.getContentSize = T.ispage ? function () {
                        return {
                            w: Math.max(l.body.scrollWidth, l.documentElement.scrollWidth),
                            h: Math.max(l.body.scrollHeight, l.documentElement.scrollHeight)
                        }
                    } : T.haswrapper ? function () {
                        return {w: T.doc[0].offsetWidth, h: T.doc[0].offsetHeight}
                    } : function () {
                        return {w: T.docscroll[0].scrollWidth, h: T.docscroll[0].scrollHeight}
                    }, this.onResize = function (e, o) {
                        if (!T || !T.win) return !1;
                        var t = T.page.maxh,
                            r = T.page.maxw,
                            i = T.view.h,
                            s = T.view.w;
                        if (T.view = {
                            w: T.ispage ? T.win.width() : T.win[0].clientWidth,
                            h: T.ispage ? T.win.height() : T.win[0].clientHeight
                        }, T.page = o || T.getContentSize(), T.page.maxh = Math.max(0, T.page.h - T.view.h), T.page.maxw = Math.max(0, T.page.w - T.view.w), T.page.maxh == t && T.page.maxw == r && T.view.w == s && T.view.h == i) {
                            if (T.ispage) return T;
                            var n = T.win.offset();
                            if (T.lastposition) {
                                var l = T.lastposition;
                                if (l.top == n.top && l.left == n.left) return T
                            }
                            T.lastposition = n
                        }
                        return 0 === T.page.maxh ? (T.hideRail(), T.scrollvaluemax = 0, T.scroll.y = 0, T.scrollratio.y = 0, T.cursorheight = 0, T.setScrollTop(0), T.rail && (T.rail.scrollable = !1)) : (T.page.maxh -= M.railpadding.top + M.railpadding.bottom, T.rail.scrollable = !0), 0 === T.page.maxw ? (T.hideRailHr(), T.scrollvaluemaxw = 0, T.scroll.x = 0, T.scrollratio.x = 0, T.cursorwidth = 0, T.setScrollLeft(0), T.railh && (T.railh.scrollable = !1)) : (T.page.maxw -= M.railpadding.left + M.railpadding.right, T.railh && (T.railh.scrollable = M.horizrailenabled)), T.railslocked = T.locked || 0 === T.page.maxh && 0 === T.page.maxw, T.railslocked ? (T.ispage || T.updateScrollBar(T.view), !1) : (T.hidden || (T.rail.visibility || T.showRail(), T.railh && !T.railh.visibility && T.showRailHr()), T.istextarea && T.win.css("resize") && "none" != T.win.css("resize") && (T.view.h -= 20), T.cursorheight = Math.min(T.view.h, Math.round(T.view.h * (T.view.h / T.page.h))), T.cursorheight = M.cursorfixedheight ? M.cursorfixedheight : Math.max(M.cursorminheight, T.cursorheight), T.cursorwidth = Math.min(T.view.w, Math.round(T.view.w * (T.view.w / T.page.w))), T.cursorwidth = M.cursorfixedheight ? M.cursorfixedheight : Math.max(M.cursorminheight, T.cursorwidth), T.scrollvaluemax = T.view.h - T.cursorheight - (M.railpadding.top + M.railpadding.bottom), T.hasborderbox || (T.scrollvaluemax -= T.cursor[0].offsetHeight - T.cursor[0].clientHeight), T.railh && (T.railh.width = T.page.maxh > 0 ? T.view.w - T.rail.width : T.view.w, T.scrollvaluemaxw = T.railh.width - T.cursorwidth - (M.railpadding.left + M.railpadding.right)), T.ispage || T.updateScrollBar(T.view), T.scrollratio = {
                            x: T.page.maxw / T.scrollvaluemaxw,
                            y: T.page.maxh / T.scrollvaluemax
                        }, T.getScrollTop() > T.page.maxh ? T.doScrollTop(T.page.maxh) : (T.scroll.y = T.getScrollTop() / T.scrollratio.y | 0, T.scroll.x = T.getScrollLeft() / T.scrollratio.x | 0, T.cursoractive && T.noticeCursor()), T.scroll.y && 0 === T.getScrollTop() && T.doScrollTo(T.scroll.y * T.scrollratio.y | 0), T)
                    }, this.resize = T.onResize;
                    var O = 0;
                    this.onscreenresize = function (e) {
                        clearTimeout(O);
                        var o = !T.ispage && !T.haswrapper;
                        o && T.hideRails(), O = setTimeout(function () {
                            T && (o && T.showRails(), T.resize()), O = 0
                        }, 120)
                    }, this.lazyResize = function (e) {
                        return clearTimeout(O), e = isNaN(e) ? 240 : e, O = setTimeout(function () {
                            T && T.resize(), O = 0
                        }, e), T
                    }, this.jqbind = function (e, o, t) {
                        T.events.push({e: e, n: o, f: t, q: !0}), n(e).on(o, t)
                    }, this.mousewheel = function (e, o, t) {
                        var r = "jquery" in e ? e[0] : e;
                        if ("onwheel" in l.createElement("div")) T._bind(r, "wheel", o, t || !1);
                        else {
                            var i = void 0 !== l.onmousewheel ? "mousewheel" : "DOMMouseScroll";
                            S(r, i, o, t || !1), "DOMMouseScroll" == i && S(r, "MozMousePixelScroll", o, t || !1)
                        }
                    };
                    var Y = !1;
                    if (P.haseventlistener) {
                        try {
                            var H = Object.defineProperty({}, "passive", {
                                get: function () {
                                    Y = !0
                                }
                            });
                            a.addEventListener("test", null, H)
                        } catch (e) {
                        }
                        this.stopPropagation = function (e) {
                            return !!e && ((e = e.original ? e.original : e).stopPropagation(), !1)
                        }, this.cancelEvent = function (e) {
                            return e.cancelable && e.preventDefault(), e.stopImmediatePropagation(), e.preventManipulation && e.preventManipulation(), !1
                        }
                    } else Event.prototype.preventDefault = function () {
                        this.returnValue = !1
                    }, Event.prototype.stopPropagation = function () {
                        this.cancelBubble = !0
                    }, a.constructor.prototype.addEventListener = l.constructor.prototype.addEventListener = Element.prototype.addEventListener = function (e, o, t) {
                        this.attachEvent("on" + e, o)
                    }, a.constructor.prototype.removeEventListener = l.constructor.prototype.removeEventListener = Element.prototype.removeEventListener = function (e, o, t) {
                        this.detachEvent("on" + e, o)
                    }, this.cancelEvent = function (e) {
                        return (e = e || a.event) && (e.cancelBubble = !0, e.cancel = !0, e.returnValue = !1), !1
                    }, this.stopPropagation = function (e) {
                        return (e = e || a.event) && (e.cancelBubble = !0), !1
                    };
                    this.delegate = function (e, o, t, r, i) {
                        var s = d[o] || !1;
                        s || (s = {
                            a: [],
                            l: [],
                            f: function (e) {
                                for (var o = s.l, t = !1, r = o.length - 1; r >= 0; r--)
                                    if (!1 === (t = o[r].call(e.target, e))) return !1;
                                return t
                            }
                        }, T.bind(e, o, s.f, r, i), d[o] = s), T.ispage ? (s.a = [T.id].concat(s.a), s.l = [t].concat(s.l)) : (s.a.push(T.id), s.l.push(t))
                    }, this.undelegate = function (e, o, t, r, i) {
                        var s = d[o] || !1;
                        if (s && s.l)
                            for (var n = 0, l = s.l.length; n < l; n++) s.a[n] === T.id && (s.a.splice(n), s.l.splice(n), 0 === s.a.length && (T._unbind(e, o, s.l.f), d[o] = null))
                    }, this.bind = function (e, o, t, r, i) {
                        var s = "jquery" in e ? e[0] : e;
                        T._bind(s, o, t, r || !1, i || !1)
                    }, this._bind = function (e, o, t, r, i) {
                        T.events.push({e: e, n: o, f: t, b: r, q: !1}), Y && i ? e.addEventListener(o, t, {
                            passive: !1,
                            capture: r
                        }) : e.addEventListener(o, t, r || !1)
                    }, this._unbind = function (e, o, t, r) {
                        d[o] ? T.undelegate(e, o, t, r) : e.removeEventListener(o, t, r)
                    }, this.unbindAll = function () {
                        for (var e = 0; e < T.events.length; e++) {
                            var o = T.events[e];
                            o.q ? o.e.unbind(o.n, o.f) : T._unbind(o.e, o.n, o.f, o.b)
                        }
                    }, this.showRails = function () {
                        return T.showRail().showRailHr()
                    }, this.showRail = function () {
                        return 0 === T.page.maxh || !T.ispage && "none" == T.win.css("display") || (T.rail.visibility = !0, T.rail.css("display", "block")), T
                    }, this.showRailHr = function () {
                        return T.railh && (0 === T.page.maxw || !T.ispage && "none" == T.win.css("display") || (T.railh.visibility = !0, T.railh.css("display", "block"))), T
                    }, this.hideRails = function () {
                        return T.hideRail().hideRailHr()
                    }, this.hideRail = function () {
                        return T.rail.visibility = !1, T.rail.css("display", "none"), T
                    }, this.hideRailHr = function () {
                        return T.railh && (T.railh.visibility = !1, T.railh.css("display", "none")), T
                    }, this.show = function () {
                        return T.hidden = !1, T.railslocked = !1, T.showRails()
                    }, this.hide = function () {
                        return T.hidden = !0, T.railslocked = !0, T.hideRails()
                    }, this.toggle = function () {
                        return T.hidden ? T.show() : T.hide()
                    }, this.remove = function () {
                        T.stop(), T.cursortimeout && clearTimeout(T.cursortimeout);
                        for (var e in T.delaylist) T.delaylist[e] && h(T.delaylist[e].h);
                        T.doZoomOut(), T.unbindAll(), P.isie9 && T.win[0].detachEvent("onpropertychange", T.onAttributeChange), !1 !== T.observer && T.observer.disconnect(), !1 !== T.observerremover && T.observerremover.disconnect(), !1 !== T.observerbody && T.observerbody.disconnect(), T.events = null, T.cursor && T.cursor.remove(), T.cursorh && T.cursorh.remove(), T.rail && T.rail.remove(), T.railh && T.railh.remove(), T.zoom && T.zoom.remove();
                        for (var o = 0; o < T.saved.css.length; o++) {
                            var t = T.saved.css[o];
                            t[0].css(t[1], void 0 === t[2] ? "" : t[2])
                        }
                        T.saved = !1, T.me.data("__nicescroll", "");
                        var r = n.nicescroll;
                        r.each(function (e) {
                            if (this && this.id === T.id) {
                                delete r[e];
                                for (var o = ++e; o < r.length; o++, e++) r[e] = r[o];
                                --r.length && delete r[r.length]
                            }
                        });
                        for (var i in T) T[i] = null, delete T[i];
                        T = null
                    }, this.scrollstart = function (e) {
                        return this.onscrollstart = e, T
                    }, this.scrollend = function (e) {
                        return this.onscrollend = e, T
                    }, this.scrollcancel = function (e) {
                        return this.onscrollcancel = e, T
                    }, this.zoomin = function (e) {
                        return this.onzoomin = e, T
                    }, this.zoomout = function (e) {
                        return this.onzoomout = e, T
                    }, this.isScrollable = function (e) {
                        var o = e.target ? e.target : e;
                        if ("OPTION" == o.nodeName) return !0;
                        for (; o && 1 == o.nodeType && o !== this.me[0] && !/^BODY|HTML/.test(o.nodeName);) {
                            var t = n(o),
                                r = t.css("overflowY") || t.css("overflowX") || t.css("overflow") || "";
                            if (/scroll|auto/.test(r)) return o.clientHeight != o.scrollHeight;
                            o = !!o.parentNode && o.parentNode
                        }
                        return !1
                    }, this.getViewport = function (e) {
                        for (var o = !(!e || !e.parentNode) && e.parentNode; o && 1 == o.nodeType && !/^BODY|HTML/.test(o.nodeName);) {
                            var t = n(o);
                            if (/fixed|absolute/.test(t.css("position"))) return t;
                            var r = t.css("overflowY") || t.css("overflowX") || t.css("overflow") || "";
                            if (/scroll|auto/.test(r) && o.clientHeight != o.scrollHeight) return t;
                            if (t.getNiceScroll().length > 0) return t;
                            o = !!o.parentNode && o.parentNode
                        }
                        return !1
                    }, this.triggerScrollStart = function (e, o, t, r, i) {
                        if (T.onscrollstart) {
                            var s = {
                                type: "scrollstart",
                                current: {x: e, y: o},
                                request: {x: t, y: r},
                                end: {x: T.newscrollx, y: T.newscrolly},
                                speed: i
                            };
                            T.onscrollstart.call(T, s)
                        }
                    }, this.triggerScrollEnd = function () {
                        if (T.onscrollend) {
                            var e = T.getScrollLeft(),
                                o = T.getScrollTop(),
                                t = {type: "scrollend", current: {x: e, y: o}, end: {x: e, y: o}};
                            T.onscrollend.call(T, t)
                        }
                    };
                    var B = 0,
                        X = 0,
                        D = 0,
                        A = 1,
                        q = !1;
                    if (this.onmousewheel = function (e) {
                        if (T.wheelprevented || T.locked) return !1;
                        if (T.railslocked) return T.debounced("checkunlock", T.resize, 250), !1;
                        if (T.rail.drag) return T.cancelEvent(e);
                        if ("auto" === M.oneaxismousemode && 0 !== e.deltaX && (M.oneaxismousemode = !1), M.oneaxismousemode && 0 === e.deltaX && !T.rail.scrollable) return !T.railh || !T.railh.scrollable || T.onmousewheelhr(e);
                        var o = f(),
                            t = !1;
                        if (M.preservenativescrolling && T.checkarea + 600 < o && (T.nativescrollingarea = T.isScrollable(e), t = !0), T.checkarea = o, T.nativescrollingarea) return !0;
                        var r = k(e, !1, t);
                        return r && (T.checkarea = 0), r
                    }, this.onmousewheelhr = function (e) {
                        if (!T.wheelprevented) {
                            if (T.railslocked || !T.railh.scrollable) return !0;
                            if (T.rail.drag) return T.cancelEvent(e);
                            var o = f(),
                                t = !1;
                            return M.preservenativescrolling && T.checkarea + 600 < o && (T.nativescrollingarea = T.isScrollable(e), t = !0), T.checkarea = o, !!T.nativescrollingarea || (T.railslocked ? T.cancelEvent(e) : k(e, !0, t))
                        }
                    }, this.stop = function () {
                        return T.cancelScroll(), T.scrollmon && T.scrollmon.stop(), T.cursorfreezed = !1, T.scroll.y = Math.round(T.getScrollTop() * (1 / T.scrollratio.y)), T.noticeCursor(), T
                    }, this.getTransitionSpeed = function (e) {
                        return 80 + e / 72 * M.scrollspeed | 0
                    }, M.smoothscroll)
                        if (T.ishwscroll && P.hastransition && M.usetransition && M.smoothscroll) {
                            var j = "";
                            this.resetTransition = function () {
                                j = "", T.doc.css(P.prefixstyle + "transition-duration", "0ms")
                            }, this.prepareTransition = function (e, o) {
                                var t = o ? e : T.getTransitionSpeed(e),
                                    r = t + "ms";
                                return j !== r && (j = r, T.doc.css(P.prefixstyle + "transition-duration", r)), t
                            }, this.doScrollLeft = function (e, o) {
                                var t = T.scrollrunning ? T.newscrolly : T.getScrollTop();
                                T.doScrollPos(e, t, o)
                            }, this.doScrollTop = function (e, o) {
                                var t = T.scrollrunning ? T.newscrollx : T.getScrollLeft();
                                T.doScrollPos(t, e, o)
                            }, this.cursorupdate = {
                                running: !1,
                                start: function () {
                                    var e = this;
                                    if (!e.running) {
                                        e.running = !0;
                                        var o = function () {
                                            e.running && u(o), T.showCursor(T.getScrollTop(), T.getScrollLeft()), T.notifyScrollEvent(T.win[0])
                                        };
                                        u(o)
                                    }
                                },
                                stop: function () {
                                    this.running = !1
                                }
                            }, this.doScrollPos = function (e, o, t) {
                                var r = T.getScrollTop(),
                                    i = T.getScrollLeft();
                                if (((T.newscrolly - r) * (o - r) < 0 || (T.newscrollx - i) * (e - i) < 0) && T.cancelScroll(), M.bouncescroll ? (o < 0 ? o = o / 2 | 0 : o > T.page.maxh && (o = T.page.maxh + (o - T.page.maxh) / 2 | 0), e < 0 ? e = e / 2 | 0 : e > T.page.maxw && (e = T.page.maxw + (e - T.page.maxw) / 2 | 0)) : (o < 0 ? o = 0 : o > T.page.maxh && (o = T.page.maxh), e < 0 ? e = 0 : e > T.page.maxw && (e = T.page.maxw)), T.scrollrunning && e == T.newscrollx && o == T.newscrolly) return !1;
                                T.newscrolly = o, T.newscrollx = e;
                                var s = T.getScrollTop(),
                                    n = T.getScrollLeft(),
                                    l = {};
                                l.x = e - n, l.y = o - s;
                                var a = 0 | Math.sqrt(l.x * l.x + l.y * l.y),
                                    c = T.prepareTransition(a);
                                T.scrollrunning || (T.scrollrunning = !0, T.triggerScrollStart(n, s, e, o, c), T.cursorupdate.start()), T.scrollendtrapped = !0, P.transitionend || (T.scrollendtrapped && clearTimeout(T.scrollendtrapped), T.scrollendtrapped = setTimeout(T.onScrollTransitionEnd, c)), T.setScrollTop(T.newscrolly), T.setScrollLeft(T.newscrollx)
                            }, this.cancelScroll = function () {
                                if (!T.scrollendtrapped) return !0;
                                var e = T.getScrollTop(),
                                    o = T.getScrollLeft();
                                return T.scrollrunning = !1, P.transitionend || clearTimeout(P.transitionend), T.scrollendtrapped = !1, T.resetTransition(), T.setScrollTop(e), T.railh && T.setScrollLeft(o), T.timerscroll && T.timerscroll.tm && clearInterval(T.timerscroll.tm), T.timerscroll = !1, T.cursorfreezed = !1, T.cursorupdate.stop(), T.showCursor(e, o), T
                            }, this.onScrollTransitionEnd = function () {
                                if (T.scrollendtrapped) {
                                    var e = T.getScrollTop(),
                                        o = T.getScrollLeft();
                                    if (e < 0 ? e = 0 : e > T.page.maxh && (e = T.page.maxh), o < 0 ? o = 0 : o > T.page.maxw && (o = T.page.maxw), e != T.newscrolly || o != T.newscrollx) return T.doScrollPos(o, e, M.snapbackspeed);
                                    T.scrollrunning && T.triggerScrollEnd(), T.scrollrunning = !1, T.scrollendtrapped = !1, T.resetTransition(), T.timerscroll = !1, T.setScrollTop(e), T.railh && T.setScrollLeft(o), T.cursorupdate.stop(), T.noticeCursor(!1, e, o), T.cursorfreezed = !1
                                }
                            }
                        } else this.doScrollLeft = function (e, o) {
                            var t = T.scrollrunning ? T.newscrolly : T.getScrollTop();
                            T.doScrollPos(e, t, o)
                        }, this.doScrollTop = function (e, o) {
                            var t = T.scrollrunning ? T.newscrollx : T.getScrollLeft();
                            T.doScrollPos(t, e, o)
                        }, this.doScrollPos = function (e, o, t) {
                            var r = T.getScrollTop(),
                                i = T.getScrollLeft();
                            ((T.newscrolly - r) * (o - r) < 0 || (T.newscrollx - i) * (e - i) < 0) && T.cancelScroll();
                            var s = !1;
                            if (T.bouncescroll && T.rail.visibility || (o < 0 ? (o = 0, s = !0) : o > T.page.maxh && (o = T.page.maxh, s = !0)), T.bouncescroll && T.railh.visibility || (e < 0 ? (e = 0, s = !0) : e > T.page.maxw && (e = T.page.maxw, s = !0)), T.scrollrunning && T.newscrolly === o && T.newscrollx === e) return !0;
                            T.newscrolly = o, T.newscrollx = e, T.dst = {}, T.dst.x = e - i, T.dst.y = o - r, T.dst.px = i, T.dst.py = r;
                            var n = 0 | Math.sqrt(T.dst.x * T.dst.x + T.dst.y * T.dst.y),
                                l = T.getTransitionSpeed(n);
                            T.bzscroll = {};
                            var a = s ? 1 : .58;
                            T.bzscroll.x = new R(i, T.newscrollx, l, 0, 0, a, 1), T.bzscroll.y = new R(r, T.newscrolly, l, 0, 0, a, 1);
                            f();
                            var c = function () {
                                if (T.scrollrunning) {
                                    var e = T.bzscroll.y.getPos();
                                    T.setScrollLeft(T.bzscroll.x.getNow()), T.setScrollTop(T.bzscroll.y.getNow()), e <= 1 ? T.timer = u(c) : (T.scrollrunning = !1, T.timer = 0, T.triggerScrollEnd())
                                }
                            };
                            T.scrollrunning || (T.triggerScrollStart(i, r, e, o, l), T.scrollrunning = !0, T.timer = u(c))
                        }, this.cancelScroll = function () {
                            return T.timer && h(T.timer), T.timer = 0, T.bzscroll = !1, T.scrollrunning = !1, T
                        };
                    else this.doScrollLeft = function (e, o) {
                        var t = T.getScrollTop();
                        T.doScrollPos(e, t, o)
                    }, this.doScrollTop = function (e, o) {
                        var t = T.getScrollLeft();
                        T.doScrollPos(t, e, o)
                    }, this.doScrollPos = function (e, o, t) {
                        var r = e > T.page.maxw ? T.page.maxw : e;
                        r < 0 && (r = 0);
                        var i = o > T.page.maxh ? T.page.maxh : o;
                        i < 0 && (i = 0), T.synched("scroll", function () {
                            T.setScrollTop(i), T.setScrollLeft(r)
                        })
                    }, this.cancelScroll = function () {
                    };
                    this.doScrollBy = function (e, o) {
                        z(0, e)
                    }, this.doScrollLeftBy = function (e, o) {
                        z(e, 0)
                    }, this.doScrollTo = function (e, o) {
                        var t = o ? Math.round(e * T.scrollratio.y) : e;
                        t < 0 ? t = 0 : t > T.page.maxh && (t = T.page.maxh), T.cursorfreezed = !1, T.doScrollTop(e)
                    }, this.checkContentSize = function () {
                        var e = T.getContentSize();
                        e.h == T.page.h && e.w == T.page.w || T.resize(!1, e)
                    }, T.onscroll = function (e) {
                        T.rail.drag || T.cursorfreezed || T.synched("scroll", function () {
                            T.scroll.y = Math.round(T.getScrollTop() / T.scrollratio.y), T.railh && (T.scroll.x = Math.round(T.getScrollLeft() / T.scrollratio.x)), T.noticeCursor()
                        })
                    }, T.bind(T.docscroll, "scroll", T.onscroll), this.doZoomIn = function (e) {
                        if (!T.zoomactive) {
                            T.zoomactive = !0, T.zoomrestore = {style: {}};
                            var o = ["position", "top", "left", "zIndex", "backgroundColor", "marginTop", "marginBottom", "marginLeft", "marginRight"],
                                t = T.win[0].style;
                            for (var r in o) {
                                var i = o[r];
                                T.zoomrestore.style[i] = void 0 !== t[i] ? t[i] : ""
                            }
                            T.zoomrestore.style.width = T.win.css("width"), T.zoomrestore.style.height = T.win.css("height"), T.zoomrestore.padding = {
                                w: T.win.outerWidth() - T.win.width(),
                                h: T.win.outerHeight() - T.win.height()
                            }, P.isios4 && (T.zoomrestore.scrollTop = c.scrollTop(), c.scrollTop(0)), T.win.css({
                                position: P.isios4 ? "absolute" : "fixed",
                                top: 0,
                                left: 0,
                                zIndex: s + 100,
                                margin: 0
                            });
                            var n = T.win.css("backgroundColor");
                            return ("" === n || /transparent|rgba\(0, 0, 0, 0\)|rgba\(0,0,0,0\)/.test(n)) && T.win.css("backgroundColor", "#fff"), T.rail.css({zIndex: s + 101}), T.zoom.css({zIndex: s + 102}), T.zoom.css("backgroundPosition", "0 -18px"), T.resizeZoom(), T.onzoomin && T.onzoomin.call(T), T.cancelEvent(e)
                        }
                    }, this.doZoomOut = function (e) {
                        if (T.zoomactive) return T.zoomactive = !1, T.win.css("margin", ""), T.win.css(T.zoomrestore.style), P.isios4 && c.scrollTop(T.zoomrestore.scrollTop), T.rail.css({"z-index": T.zindex}), T.zoom.css({"z-index": T.zindex}), T.zoomrestore = !1, T.zoom.css("backgroundPosition", "0 0"), T.onResize(), T.onzoomout && T.onzoomout.call(T), T.cancelEvent(e)
                    }, this.doZoom = function (e) {
                        return T.zoomactive ? T.doZoomOut(e) : T.doZoomIn(e)
                    }, this.resizeZoom = function () {
                        if (T.zoomactive) {
                            var e = T.getScrollTop();
                            T.win.css({
                                width: c.width() - T.zoomrestore.padding.w + "px",
                                height: c.height() - T.zoomrestore.padding.h + "px"
                            }), T.onResize(), T.setScrollTop(Math.min(T.page.maxh, e))
                        }
                    }, this.init(), n.nicescroll.push(this)
                },
                y = function (e) {
                    var o = this;
                    this.nc = e, this.lastx = 0, this.lasty = 0, this.speedx = 0, this.speedy = 0, this.lasttime = 0, this.steptime = 0, this.snapx = !1, this.snapy = !1, this.demulx = 0, this.demuly = 0, this.lastscrollx = -1, this.lastscrolly = -1, this.chkx = 0, this.chky = 0, this.timer = 0, this.reset = function (e, t) {
                        o.stop(), o.steptime = 0, o.lasttime = f(), o.speedx = 0, o.speedy = 0, o.lastx = e, o.lasty = t, o.lastscrollx = -1, o.lastscrolly = -1
                    }, this.update = function (e, t) {
                        var r = f();
                        o.steptime = r - o.lasttime, o.lasttime = r;
                        var i = t - o.lasty,
                            s = e - o.lastx,
                            n = o.nc.getScrollTop() + i,
                            l = o.nc.getScrollLeft() + s;
                        o.snapx = l < 0 || l > o.nc.page.maxw, o.snapy = n < 0 || n > o.nc.page.maxh, o.speedx = s, o.speedy = i, o.lastx = e, o.lasty = t
                    }, this.stop = function () {
                        o.nc.unsynched("domomentum2d"), o.timer && clearTimeout(o.timer), o.timer = 0, o.lastscrollx = -1, o.lastscrolly = -1
                    }, this.doSnapy = function (e, t) {
                        var r = !1;
                        t < 0 ? (t = 0, r = !0) : t > o.nc.page.maxh && (t = o.nc.page.maxh, r = !0), e < 0 ? (e = 0, r = !0) : e > o.nc.page.maxw && (e = o.nc.page.maxw, r = !0), r ? o.nc.doScrollPos(e, t, o.nc.opt.snapbackspeed) : o.nc.triggerScrollEnd()
                    }, this.doMomentum = function (e) {
                        var t = f(),
                            r = e ? t + e : o.lasttime,
                            i = o.nc.getScrollLeft(),
                            s = o.nc.getScrollTop(),
                            n = o.nc.page.maxh,
                            l = o.nc.page.maxw;
                        o.speedx = l > 0 ? Math.min(60, o.speedx) : 0, o.speedy = n > 0 ? Math.min(60, o.speedy) : 0;
                        var a = r && t - r <= 60;
                        (s < 0 || s > n || i < 0 || i > l) && (a = !1);
                        var c = !(!o.speedy || !a) && o.speedy,
                            d = !(!o.speedx || !a) && o.speedx;
                        if (c || d) {
                            var u = Math.max(16, o.steptime);
                            if (u > 50) {
                                var h = u / 50;
                                o.speedx *= h, o.speedy *= h, u = 50
                            }
                            o.demulxy = 0, o.lastscrollx = o.nc.getScrollLeft(), o.chkx = o.lastscrollx, o.lastscrolly = o.nc.getScrollTop(), o.chky = o.lastscrolly;
                            var p = o.lastscrollx,
                                m = o.lastscrolly,
                                g = function () {
                                    var e = f() - t > 600 ? .04 : .02;
                                    o.speedx && (p = Math.floor(o.lastscrollx - o.speedx * (1 - o.demulxy)), o.lastscrollx = p, (p < 0 || p > l) && (e = .1)), o.speedy && (m = Math.floor(o.lastscrolly - o.speedy * (1 - o.demulxy)), o.lastscrolly = m, (m < 0 || m > n) && (e = .1)), o.demulxy = Math.min(1, o.demulxy + e), o.nc.synched("domomentum2d", function () {
                                        if (o.speedx) {
                                            o.nc.getScrollLeft();
                                            o.chkx = p, o.nc.setScrollLeft(p)
                                        }
                                        if (o.speedy) {
                                            o.nc.getScrollTop();
                                            o.chky = m, o.nc.setScrollTop(m)
                                        }
                                        o.timer || (o.nc.hideCursor(), o.doSnapy(p, m))
                                    }), o.demulxy < 1 ? o.timer = setTimeout(g, u) : (o.stop(), o.nc.hideCursor(), o.doSnapy(p, m))
                                };
                            g()
                        } else o.doSnapy(o.nc.getScrollLeft(), o.nc.getScrollTop())
                    }
                },
                x = e.fn.scrollTop;
            e.cssHooks.pageYOffset = {
                get: function (e, o, t) {
                    var r = n.data(e, "__nicescroll") || !1;
                    return r && r.ishwscroll ? r.getScrollTop() : x.call(e)
                }, set: function (e, o) {
                    var t = n.data(e, "__nicescroll") || !1;
                    return t && t.ishwscroll ? t.setScrollTop(parseInt(o)) : x.call(e, o), this
                }
            }, e.fn.scrollTop = function (e) {
                if (void 0 === e) {
                    var o = !!this[0] && (n.data(this[0], "__nicescroll") || !1);
                    return o && o.ishwscroll ? o.getScrollTop() : x.call(this)
                }
                return this.each(function () {
                    var o = n.data(this, "__nicescroll") || !1;
                    o && o.ishwscroll ? o.setScrollTop(parseInt(e)) : x.call(n(this), e)
                })
            };
            var S = e.fn.scrollLeft;
            n.cssHooks.pageXOffset = {
                get: function (e, o, t) {
                    var r = n.data(e, "__nicescroll") || !1;
                    return r && r.ishwscroll ? r.getScrollLeft() : S.call(e)
                }, set: function (e, o) {
                    var t = n.data(e, "__nicescroll") || !1;
                    return t && t.ishwscroll ? t.setScrollLeft(parseInt(o)) : S.call(e, o), this
                }
            }, e.fn.scrollLeft = function (e) {
                if (void 0 === e) {
                    var o = !!this[0] && (n.data(this[0], "__nicescroll") || !1);
                    return o && o.ishwscroll ? o.getScrollLeft() : S.call(this)
                }
                return this.each(function () {
                    var o = n.data(this, "__nicescroll") || !1;
                    o && o.ishwscroll ? o.setScrollLeft(parseInt(e)) : S.call(n(this), e)
                })
            };
            var z = function (e) {
                var o = this;
                if (this.length = 0, this.name = "nicescrollarray", this.each = function (e) {
                    return n.each(o, e), o
                }, this.push = function (e) {
                    o[o.length] = e, o.length++
                }, this.eq = function (e) {
                    return o[e]
                }, e)
                    for (var t = 0; t < e.length; t++) {
                        var r = n.data(e[t], "__nicescroll") || !1;
                        r && (this[this.length] = r, this.length++)
                    }
                return this
            };
            !function (e, o, t) {
                for (var r = 0, i = o.length; r < i; r++) t(e, o[r])
            }(z.prototype, ["show", "hide", "toggle", "onResize", "resize", "remove", "stop", "doScrollPos"], function (e, o) {
                e[o] = function () {
                    var e = arguments;
                    return this.each(function () {
                        this[o].apply(this, e)
                    })
                }
            }), e.fn.getNiceScroll = function (e) {
                return void 0 === e ? new z(this) : this[e] && n.data(this[e], "__nicescroll") || !1
            }, (e.expr.pseudos || e.expr[":"]).nicescroll = function (e) {
                return void 0 !== n.data(e, "__nicescroll")
            }, n.fn.niceScroll = function (e, o) {
                void 0 !== o || "object" != typeof e || "jquery" in e || (o = e, e = !1);
                var t = new z;
                return this.each(function () {
                    var r = n(this),
                        i = n.extend({}, o);
                    if (e) {
                        var s = n(e);
                        i.doc = s.length > 1 ? n(e, r) : s, i.win = r
                    }
                    !("doc" in i) || "win" in i || (i.win = r);
                    var l = r.data("__nicescroll") || !1;
                    l || (i.doc = i.doc || r, l = new b(i, r), r.data("__nicescroll", l)), t.push(l)
                }), 1 === t.length ? t[0] : t
            }, a.NiceScroll = {
                getjQuery: function () {
                    return e
                }
            }, n.nicescroll || (n.nicescroll = new z, n.nicescroll.options = g)
        });


        /*===================
          Main JS
         ==================*/

        (function ($) {
            "use strict";

            $(document).ready(function () {
                /*
                ========================================
                    input search open item
                ========================================
                */
                $(document).on('keyup change', '#search_form_input', function (event) {

                    let input_values = $(this).val();

                    if (input_values.length > 0) {
                        $('#search_suggestions_wrap, .search-suggestion-overlay').addClass("show");
                    } else {
                        $('#search_suggestions_wrap, .search-suggestion-overlay').removeClass("show");
                    }
                });
                $(document).on('click', '.search-suggestion-overlay, .search-click-icon', function () {
                    $('#search_suggestions_wrap, .search-suggestion-overlay').removeClass('show')
                })
                $(document).on('click', '.search-click-icon', function () {
                    $('.search-suggetions-show').toggleClass('open')
                })
                $(document).on('click', '.suggetions-icon-close, .search-suggestion-overlay', function () {
                    $('.search-suggetions-show').removeClass('open')
                    $('#search_suggestions_wrap, .search-suggestion-overlay').removeClass('show')
                })

                /*
                ========================================
                    Nice Scroll js
                ========================================
                */
                $(".product-suggestion-list, .contents-wrapper, .single-addto-cart-wrappers, .shop-details-cart-scroll-responsive").niceScroll({});

                /*
                ========================================
                    Popup Modal Cart
                ========================================
                */
                $(document).on('click', '.close-icon, .body-overlay-desktop', function () {
                    $('.shop-detail-cart-content, .body-overlay-desktop').removeClass('active');
                });
                $(document).on('click', '.popup-modal', function () {
                    $('.shop-detail-cart-content, .body-overlay-desktop').addClass('active');
                });

                /*
                ========================================
                    Discount Popup Click
                ========================================
                */
                $(document).on('click', '.discount-overlays, .close-icon', function () {
                    $('.discount-overlays, .discount-popup-area').hide();
                });

                $('.discount-popup-area').hide();
                setTimeout(function () {
                    $('.discount-popup-area').show();
                }, 3000);

                /*
                ========================================
                    Add to-Cart Click Close
                ========================================
                */
                $(document).on('click', '.close-cart', function () {
                    $(this).parent().hide(100);
                });

                /*
                ========================================
                    Cart Click Loading
                ========================================
                */
                $(document).on('click', '.cart-loading', function () {
                    $(this).addClass('active-loading')
                    setTimeout(function () {
                        $('.cart-loading').removeClass('active-loading');
                    }, 1500);
                });

                /*
                ========================================
                    Navbar Toggler
                ========================================
                */
                $(document).on('click', '.navbar-toggler', function () {
                    $(".navbar-toggler").toggleClass("active");
                });

                $(document).on('click', '.click-nav-right-icon', function () {
                    $(".show-nav-content").toggleClass("show");
                });

                /*
                ========================================
                    counter Odometer
                ========================================
                */
                $(".single-counter-count").each(function () {
                    $(this).isInViewport(function (status) {
                        if (status === "entered") {
                            for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
                                var el = document.querySelectorAll('.odometer')[i];
                                el.innerHTML = el.getAttribute("data-odometer-final");
                            }
                        }
                    });
                });

                /*
                ========================================
                    Nice Select
                ========================================
                */
                $('#nice-select').niceSelect();

                /*
                ========================================
                    Lazy Load Js
                ========================================
                */
                $('.lazyloads').Lazy();
                /*
                ========================================
                    Click Active Class
                ========================================
                */
                $(document).on('click', '.active-list .list', function () {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');
                });

                $(document).on('click', '.active-list .list a span.ad-values', function () {
                    $(this).parent().parent().siblings().removeClass('active');
                    $(this).parent().parent().addClass('active');
                });

                /*-------------------------------
                    Click Slide Open Close
                ------------------------------*/

                $(document).on('click', '.shop-left-title .title', function (e) {
                    var shopTitle = $(this).parent('.shop-left-title');
                    if (shopTitle.hasClass('open')) {
                        shopTitle.removeClass('open');
                        shopTitle.find('.shop-left-list').removeClass('open');
                        shopTitle.find('.shop-left-list').slideUp(300, "swing");
                    } else {
                        shopTitle.addClass('open');
                        shopTitle.children('.shop-left-list').slideDown(300, "swing");
                        shopTitle.siblings('.shop-left-title').children('.shop-left-list').slideUp(300, "swing");
                        shopTitle.siblings('.shop-left-title').removeClass('open');
                    }
                });
                /*
                ========================================
                    Click Clear Filter
                ========================================
                */
                $(document).on('click', '.category-lists .list .ad-values', function () {
                    $('.selected-clear-items').show();
                    $('.click-hide-filter .click-hide').show();
                });
                /*
                ========================================
                    Click add Value text
                ========================================
                */

                // Category
                $(document).on('click', '.category-lists .ad-values, .category-lists li', function (event) {

                    $('.selectder-filter-contents').show();
                    let value = $(this).data('value').trim();
                    let slug = $(this).data('slug').trim();
                    let filters = $('#_porduct_fitler_item li.show-value');

                    let contains = $('#_porduct_fitler_item .category-filter');

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="show-value category-filter" value="${value}" data-filter="category-lists" data-slug="${slug}"><a class="click-hide" href="javascript:void(0)"> ${value} </a> </li>`);
                    } else {
                        contains.attr('value', value);
                        contains.attr('data-slug', slug);
                        contains.find('a').text(value);
                    }

                    return false;
                });

                // Category
                $(document).on('click', '.price-range-slider .ui-range-slider', function (event) {
                    let minValue = $('.min-price-for-filter').val();
                    let maxValue = $('.max-price-for-filter').val();
                    $('.selectder-filter-contents').show();
                    let value = minValue + ' - ' + maxValue;
                    let slug = 'price';

                    let filters = $('#_porduct_fitler_item li.show-value');

                    let contains = $('#_porduct_fitler_item .category-filter');

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="show-value category-filter" value="${value}" data-filter="category-lists" data-slug="${slug}"><a class="click-hide click-hide-price" href="javascript:void(0)"> ${value} </a> </li>`);
                    } else {
                        contains.attr('value', value);
                        contains.attr('data-slug', slug);
                        contains.find('a').text(value);
                    }

                    return false;
                });

                // Size
                $(document).on('click', '.size-lists li', function (event) {
                    $('.selectder-filter-contents').show();
                    let value = $(this).data('value');
                    let slug = $(this).data('slug');
                    let filters = $('#_porduct_fitler_item li.show-value');

                    let contains = $('#_porduct_fitler_item .size-filter');

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="show-value size-filter" value="${value}" data-filter="size-lists" data-slug="${slug}"> <a class="click-hide" href="javascript:void(0)"> ${value} </a> </li>`);
                    } else {
                        contains.attr('value', value);
                        contains.attr('data-slug', slug);
                        contains.find('a').text(value);
                    }
                    return false;
                });

                // Color
                $(document).on('click', '.color-lists li', function (event) {
                    $('.selectder-filter-contents').show();
                    let value = $(this).data('value').trim();
                    let slug = $(this).data('slug');
                    let filters = $('#_porduct_fitler_item li.show-value');

                    let contains = $('#_porduct_fitler_item .color-filter');

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="text-capitalize show-value color-filter" value="${value}" data-filter="color-lists" data-slug="${slug}"> <a class="click-hide" href="javascript:void(0)"> ${value} </a> </li>`);
                    } else {
                        contains.attr('value', value);
                        contains.attr('data-slug', slug);
                        contains.find('a').text(value);
                    }
                    return false;
                });

                // Rating
                $(document).on('click', '.filter-lists li', function (event) {
                    $('.selectder-filter-contents').show();
                    let slug = $(this).data('slug');
                    let value = slug;

                    let contains = $('#_porduct_fitler_item .rating-filter');
                    console.log(contains)

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="show-value rating-filter" data-filter="filter-lists" data-slug="${slug}"> <a class="click-hide" href="javascript:void(0)"> <span class="star_count">${value}</span> <span><i class="las la-star"></i></span> </a> </li>`);
                    } else {
                        contains.attr('data-slug', slug);
                        contains.find('a .star_count').text(value);
                    }
                    return false;
                });

                // Tag
                $(document).on('click', '.tag-lists li', function (event) {
                    $('.selectder-filter-contents').show();
                    let slug = $(this).data('slug');
                    let value = slug;

                    let contains = $('#_porduct_fitler_item .tag-filter');

                    if (contains.length === 0) {
                        $('#_porduct_fitler_item').append(`<li class="text-capitalize show-value tag-filter" data-filter="tag-lists" data-slug="${slug}"> <a class="click-hide" href="javascript:void(0)"> ${value} </a> </li>`);
                    } else {
                        contains.attr('data-slug', slug);
                        contains.find('a').text(value);
                    }
                });
                $(document).on('click', '.multi-action-icon', function () {
                    $('.multi-action-inner').slideToggle(150);
                })
                /*
                ========================================
                    Shop Responsive Sidebar
                ========================================
                */
                $(document).on('click', '.close-bars, .responsive-overlay', function () {
                    $('.shop-close, .shop-close-main, .responsive-overlay').removeClass('active');
                });

                $(document).on('click', '.sidebar-icon', function () {
                    $('.shop-close, .shop-close-main, .responsive-overlay').addClass('active');
                });

                /*
                ========================================
                    wow js init
                ========================================
                */
                new WOW().init();

                /*
                ========================================
                    Initialize tooltips
                ========================================
                */
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl)
                });

                /*
                ========================================
                    Compare Click Close
                ========================================
                */
                $(document).on('click', '.close-compare', function () {
                    $(this).parent().parent().hide(50);
                });

                /*
                ========================================
                    Tab
                ========================================
                */
                $(document).on('click', 'ul.tabs li', function () {
                    var tab_id = $(this).attr('data-tab');

                    $('ul.tabs li').removeClass('active');
                    $('.tab-content-item').removeClass('active');

                    $(this).addClass('active');
                    $("#" + tab_id).addClass('active');
                });

                /*
                ========================================
                accordion
                ========================================
                */
                $('.faq-contents .faq-title').on('click', function (e) {
                    var element = $(this).parent('.faq-item');
                    if (element.hasClass('open')) {
                        element.removeClass('open');
                        element.find('.faq-panel').removeClass('open');
                        element.find('.faq-panel').slideUp(300, "swing");
                    } else {
                        element.addClass('open');
                        element.children('.faq-panel').slideDown(300, "swing");
                        element.siblings('.faq-item').children('.faq-panel').slideUp(300, "swing");
                        element.siblings('.faq-item').removeClass('open');
                        element.siblings('.faq-item').find('.faq-title').removeClass('open');
                        element.siblings('.faq-item').find('.faq-panel').slideUp(300, "swing");
                    }
                });

                /*
                ========================================
                    Cart Click Close
                ========================================
                */

                $(document).on('click', '.close-table-cart', function () {
                    $(this).parent().parent().hide(100);
                });

                $(document).on('click', '.btn-clear', function () {
                    $('.table-cart-clear').hide(500);
                });

                /*
                ========================================
                    Payment Card Delivery
                ========================================
                */

                $(document).on('click', '.payment-card .single-card, .select-list li', function () {
                    $(this).siblings().removeClass("active");
                    $(this).addClass("active");
                });

                $(document).on('click', '.select-list li.disabled', function () {
                    $(this).removeClass("active");
                });

                /*
                ========================================
                    Click Open SignIn SignUp
                ========================================
                */

                $(document).on('click', '.click-open-form', function () {
                    $('.checkout-form-open').toggleClass('active');
                });

                $(document).on('click', '.click-open-form2', function () {
                    $(this).toggleClass('active');
                    $('.checkout-signup-form-wrapper').toggleClass('active');
                });

                $(document).on('click', '.click-open-form3', function () {
                    $(this).toggleClass('active');
                    $('.checkout-address-form-wrapper').toggleClass('active');
                });

                /*
                ========================================
                    Global Slider Init
                ========================================
                */
                var globalSlickInit = $('.global-slick-init');
                if (globalSlickInit.length > 0) {
                    //todo have to check slider item
                    $.each(globalSlickInit, function (index, value) {
                        if ($(this).children('div').length > 0) {
                            //todo configure slider settings object
                            var sliderSettings = {};
                            var allData = $(this).data();
                            var infinite = typeof allData.infinite == 'undefined' ? false : allData.infinite;
                            var arrows = typeof allData.arrows == 'undefined' ? false : allData.arrows;
                            var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                            var focusOnSelect = typeof allData.focusonselect == 'undefined' ? false : allData.focusonselect;
                            var swipeToSlide = typeof allData.swipetoslide == 'undefined' ? false : allData.swipetoslide;
                            var slidesToShow = typeof allData.slidestoshow == 'undefined' ? 1 : allData.slidestoshow;
                            var slidesToScroll = typeof allData.slidestoscroll == 'undefined' ? 1 : allData.slidestoscroll;
                            var speed = typeof allData.speed == 'undefined' ? '500' : allData.speed;
                            var dots = typeof allData.dots == 'undefined' ? false : allData.dots;
                            var cssEase = typeof allData.cssease == 'undefined' ? 'linear' : allData.cssease;
                            var prevArrow = typeof allData.prevarrow == 'undefined' ? '' : allData.prevarrow;
                            var nextArrow = typeof allData.nextarrow == 'undefined' ? '' : allData.nextarrow;
                            var centerMode = typeof allData.centermode == 'undefined' ? false : allData.centermode;
                            var centerPadding = typeof allData.centerpadding == 'undefined' ? false : allData.centerpadding;
                            var rows = typeof allData.rows == 'undefined' ? 1 : parseInt(allData.rows);
                            var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                            var autoplaySpeed = typeof allData.autoplayspeed == 'undefined' ? 2000 : parseInt(allData.autoplayspeed);
                            var lazyLoad = typeof allData.lazyload == 'undefined' ? false : allData.lazyload; // have to remove it from settings object if it undefined
                            var appendDots = typeof allData.appenddots == 'undefined' ? false : allData.appenddots;
                            var appendArrows = typeof allData.appendarrows == 'undefined' ? false : allData.appendarrows;
                            var asNavFor = typeof allData.asnavfor == 'undefined' ? false : allData.asnavfor;
                            var verticalSwiping = typeof allData.verticalswiping == 'undefined' ? false : allData.verticalswiping;
                            var vertical = typeof allData.vertical == 'undefined' ? false : allData.vertical;
                            var fade = typeof allData.fade == 'undefined' ? false : allData.fade;
                            var rtl = typeof allData.rtl == 'undefined' ? false : allData.rtl;
                            var responsive = typeof $(this).data('responsive') == 'undefined' ? false : $(this).data('responsive');
                            //slider settings object setup
                            sliderSettings.infinite = infinite;
                            sliderSettings.arrows = arrows;
                            sliderSettings.autoplay = autoplay;
                            sliderSettings.focusOnSelect = focusOnSelect;
                            sliderSettings.swipeToSlide = swipeToSlide;
                            sliderSettings.slidesToShow = slidesToShow;
                            sliderSettings.slidesToScroll = slidesToScroll;
                            sliderSettings.speed = speed;
                            sliderSettings.dots = dots;
                            sliderSettings.cssEase = cssEase;
                            sliderSettings.prevArrow = prevArrow;
                            sliderSettings.nextArrow = nextArrow;
                            sliderSettings.rows = rows;
                            sliderSettings.autoplaySpeed = autoplaySpeed;
                            sliderSettings.autoplay = autoplay;
                            sliderSettings.verticalSwiping = verticalSwiping;
                            sliderSettings.vertical = vertical;
                            sliderSettings.rtl = rtl;
                            if (centerMode != false) {
                                sliderSettings.centerMode = centerMode;
                            }
                            if (centerPadding != false) {
                                sliderSettings.centerPadding = centerPadding;
                            }
                            if (lazyLoad != false) {
                                sliderSettings.lazyLoad = lazyLoad;
                            }
                            if (appendDots != false) {
                                sliderSettings.appendDots = appendDots;
                            }
                            if (appendArrows != false) {
                                sliderSettings.appendArrows = appendArrows;
                            }
                            if (asNavFor != false) {
                                sliderSettings.asNavFor = asNavFor;
                            }
                            if (fade != false) {
                                sliderSettings.fade = fade;
                            }
                            if (responsive != false) {
                                sliderSettings.responsive = responsive;
                            }
                            $(this).slick(sliderSettings);
                        }
                    });
                }

                /*
                ========================================
                    Password Show Hide On Click
                ========================================
                */

                $(document).on("click", ".toggle-password", function (e) {
                    e.preventDefault();
                    $(this).toggleClass("show-pass");
                    let input = $(this).parent().find("input");
                    if (input.attr("type") == "password") {
                        input.attr("type", "text");
                    } else {
                        input.attr("type", "password");
                    }
                });
                /*
                ========================================
                    Click add Items
                ========================================
                */
                $(document).on('click', '.click-attr .cmn-btn', function () {
                    var addItem = $(this).parent().parent().find('.load-more-items:last-child').clone();
                    $('.load-more-items-wrapper').append(addItem);
                    addItem.css('display', 'none');
                    addItem.slideDown(600);
                })

                /*
                ========================================
                    back to top
                ========================================
                */

                $(document).on('click', '.back-to-top', function () {
                    $("html,body").animate({
                        scrollTop: 0
                    }, 700);
                });
            });

            /*
            ========================================
                back to top
            ========================================
            */
            var lastScrollTop = 0;
            $(window).on('scroll', function () {
                var scrollTop = $('.back-to-top');
                var st = $(this).scrollTop();
                if (st < lastScrollTop) {
                    scrollTop.fadeOut(100);
                } else {
                    scrollTop.fadeOut(100);
                }
                lastScrollTop = st;
            });
        })(jQuery);


        /*===================
          Lazyload Js
         ==================*/
        /*! jQuery & Zepto Lazy v1.7.10 - http://jquery.eisbehr.de/lazy - MIT&GPL-2.0 license - Copyright 2012-2018 Daniel 'Eisbehr' Kern */
        !function (t, e) {
            "use strict";

            function r(r, a, i, u, l) {
                function f() {
                    L = t.devicePixelRatio > 1,
                        i = c(i),
                    a.delay >= 0 && setTimeout(function () {
                        s(!0)
                    }, a.delay),
                    (a.delay < 0 || a.combined) && (u.e = v(a.throttle, function (t) {
                        "resize" === t.type && (w = B = -1),
                            s(t.all)
                    }),
                        u.a = function (t) {
                            t = c(t),
                                i.push.apply(i, t)
                        },
                        u.g = function () {
                            return i = n(i).filter(function () {
                                return !n(this).data(a.loadedName)
                            })
                        },
                        u.f = function (t) {
                            for (var e = 0; e < t.length; e++) {
                                var r = i.filter(function () {
                                    return this === t[e]
                                });
                                r.length && s(!1, r)
                            }
                        },
                        s(),
                        n(a.appendScroll).on("scroll." + l + " resize." + l, u.e))
                }

                function c(t) {
                    var i = a.defaultImage,
                        o = a.placeholder,
                        u = a.imageBase,
                        l = a.srcsetAttribute,
                        f = a.loaderAttribute,
                        c = a._f || {};
                    t = n(t).filter(function () {
                        var t = n(this),
                            r = m(this);
                        return !t.data(a.handledName) && (t.attr(a.attribute) || t.attr(l) || t.attr(f) || c[r] !== e)
                    }).data("plugin_" + a.name, r);
                    for (var s = 0, d = t.length; s < d; s++) {
                        var A = n(t[s]),
                            g = m(t[s]),
                            h = A.attr(a.imageBaseAttribute) || u;
                        g === N && h && A.attr(l) && A.attr(l, b(A.attr(l), h)),
                        c[g] === e || A.attr(f) || A.attr(f, c[g]),
                            g === N && i && !A.attr(E) ? A.attr(E, i) : g === N || !o || A.css(O) && "none" !== A.css(O) || A.css(O, "url('" + o + "')")
                    }
                    return t
                }

                function s(t, e) {
                    if (!i.length)
                        return void (a.autoDestroy && r.destroy());
                    for (var o = e || i, u = !1, l = a.imageBase || "", f = a.srcsetAttribute, c = a.handledName, s = 0; s < o.length; s++)
                        if (t || e || A(o[s])) {
                            var g = n(o[s]),
                                h = m(o[s]),
                                b = g.attr(a.attribute),
                                v = g.attr(a.imageBaseAttribute) || l,
                                p = g.attr(a.loaderAttribute);
                            g.data(c) || a.visibleOnly && !g.is(":visible") || !((b || g.attr(f)) && (h === N && (v + b !== g.attr(E) || g.attr(f) !== g.attr(F)) || h !== N && v + b !== g.css(O)) || p) || (u = !0,
                                g.data(c, !0),
                                d(g, h, v, p))
                        }
                    u && (i = n(i).filter(function () {
                        return !n(this).data(c)
                    }))
                }

                function d(t, e, r, i) {
                    ++z;
                    var o = function () {
                        y("onError", t),
                            p(),
                            o = n.noop
                    };
                    y("beforeLoad", t);
                    var u = a.attribute,
                        l = a.srcsetAttribute,
                        f = a.sizesAttribute,
                        c = a.retinaAttribute,
                        s = a.removeAttribute,
                        d = a.loadedName,
                        A = t.attr(c);
                    if (i) {
                        var g = function () {
                            s && t.removeAttr(a.loaderAttribute),
                                t.data(d, !0),
                                y(T, t),
                                setTimeout(p, 1),
                                g = n.noop
                        };
                        t.off(I).one(I, o).one(D, g),
                        y(i, t, function (e) {
                            e ? (t.off(D),
                                g()) : (t.off(I),
                                o())
                        }) || t.trigger(I)
                    } else {
                        var h = n(new Image);
                        h.one(I, o).one(D, function () {
                            t.hide(),
                                e === N ? t.attr(C, h.attr(C)).attr(F, h.attr(F)).attr(E, h.attr(E)) : t.css(O, "url('" + h.attr(E) + "')"),
                                t[a.effect](a.effectTime),
                            s && (t.removeAttr(u + " " + l + " " + c + " " + a.imageBaseAttribute),
                            f !== C && t.removeAttr(f)),
                                t.data(d, !0),
                                y(T, t),
                                h.remove(),
                                p()
                        });
                        var m = (L && A ? A : t.attr(u)) || "";
                        h.attr(C, t.attr(f)).attr(F, t.attr(l)).attr(E, m ? r + m : null),
                        h.complete && h.trigger(D)
                    }
                }

                function A(t) {
                    var e = t.getBoundingClientRect(),
                        r = a.scrollDirection,
                        n = a.threshold,
                        i = h() + n > e.top && -n < e.bottom,
                        o = g() + n > e.left && -n < e.right;
                    return "vertical" === r ? i : "horizontal" === r ? o : i && o
                }

                function g() {
                    return w >= 0 ? w : w = n(t).width()
                }

                function h() {
                    return B >= 0 ? B : B = n(t).height()
                }

                function m(t) {
                    return t.tagName.toLowerCase()
                }

                function b(t, e) {
                    if (e) {
                        var r = t.split(",");
                        t = "";
                        for (var a = 0, n = r.length; a < n; a++)
                            t += e + r[a].trim() + (a !== n - 1 ? "," : "")
                    }
                    return t
                }

                function v(t, e) {
                    var n, i = 0;
                    return function (o, u) {
                        function l() {
                            i = +new Date,
                                e.call(r, o)
                        }

                        var f = +new Date - i;
                        n && clearTimeout(n),
                            f > t || !a.enableThrottle || u ? l() : n = setTimeout(l, t - f)
                    }
                }

                function p() {
                    --z,
                    i.length || z || y("onFinishedAll")
                }

                function y(t, e, n) {
                    return !!(t = a[t]) && (t.apply(r, [].slice.call(arguments, 1)), !0)
                }

                var z = 0,
                    w = -1,
                    B = -1,
                    L = !1,
                    T = "afterLoad",
                    D = "load",
                    I = "error",
                    N = "img",
                    E = "src",
                    F = "srcset",
                    C = "sizes",
                    O = "background-image";
                "event" === a.bind || o ? f() : n(t).on(D + "." + l, f)
            }

            function a(a, o) {
                var u = this,
                    l = n.extend({}, u.config, o),
                    f = {},
                    c = l.name + "-" + ++i;
                return u.config = function (t, r) {
                    return r === e ? l[t] : (l[t] = r,
                        u)
                },
                    u.addItems = function (t) {
                        return f.a && f.a("string" === n.type(t) ? n(t) : t),
                            u
                    },
                    u.getItems = function () {
                        return f.g ? f.g() : {}
                    },
                    u.update = function (t) {
                        return f.e && f.e({}, !t),
                            u
                    },
                    u.force = function (t) {
                        return f.f && f.f("string" === n.type(t) ? n(t) : t),
                            u
                    },
                    u.loadAll = function () {
                        return f.e && f.e({
                            all: !0
                        }, !0),
                            u
                    },
                    u.destroy = function () {
                        return n(l.appendScroll).off("." + c, f.e),
                            n(t).off("." + c),
                            f = {},
                            e
                    },
                    r(u, l, a, f, c),
                    l.chainable ? a : u
            }

            var n = t.jQuery || t.Zepto,
                i = 0,
                o = !1;
            n.fn.Lazy = n.fn.lazy = function (t) {
                return new a(this, t)
            },
                n.Lazy = n.lazy = function (t, r, i) {
                    if (n.isFunction(r) && (i = r,
                        r = []),
                        n.isFunction(i)) {
                        t = n.isArray(t) ? t : [t],
                            r = n.isArray(r) ? r : [r];
                        for (var o = a.prototype.config, u = o._f || (o._f = {}), l = 0, f = t.length; l < f; l++)
                            (o[t[l]] === e || n.isFunction(o[t[l]])) && (o[t[l]] = i);
                        for (var c = 0, s = r.length; c < s; c++)
                            u[r[c]] = t[0]
                    }
                },
                a.prototype.config = {
                    name: "lazy",
                    chainable: !0,
                    autoDestroy: !0,
                    bind: "load",
                    threshold: 500,
                    visibleOnly: !1,
                    appendScroll: t,
                    scrollDirection: "both",
                    imageBase: null,
                    defaultImage: "data:image/gif;base64,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",
                    placeholder: null,
                    delay: -1,
                    combined: !1,
                    attribute: "data-src",
                    srcsetAttribute: "data-srcset",
                    sizesAttribute: "data-sizes",
                    retinaAttribute: "data-retina",
                    loaderAttribute: "data-loader",
                    imageBaseAttribute: "data-imagebase",
                    removeAttribute: !0,
                    handledName: "handled",
                    loadedName: "loaded",
                    effect: "show",
                    effectTime: 0,
                    enableThrottle: !0,
                    throttle: 250,
                    beforeLoad: e,
                    afterLoad: e,
                    onError: e,
                    onFinishedAll: e
                },
                n(t).on("load", function () {
                    o = !0
                })
        }(window);

    </script>

@endsection
