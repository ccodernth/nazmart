{{--
<!-- Trendy area starts -->
<section class="trendy-area" data-padding-top="{{$data['padding_top']}}" data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container container-one">
        <div class="section-title theme-two">
            <h2 class="title fw-400"> {{\App\Helpers\SanitizeInput::esc_html($data['title']) ?? 'Title'}} </h2>
            <p class="para"> {{\App\Helpers\SanitizeInput::esc_html($data['subtitle']) ?? ''}} </p>
        </div>
        <div class="row gy-4 mt-3">
            @foreach($data['products'] as $product)
                @php
                    $data = get_product_dynamic_price($product);
                    $campaign_name = $data['campaign_name'];
                    $regular_price = $data['regular_price'];
                    $sale_price = $data['sale_price'];
                    $discount = $data['discount'];
                @endphp

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-{{productCards()}}">
                    <div class="global-card center-text no-shadow radius-0 pb-0">
                        <div class="global-card-thumb">
                            <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                {!! render_image_markup_by_attachment_id($product->image_id, 'rounded', 'grid') !!}
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
                            <h5 class="global-card-contents-title">
                                <a href="{{route('tenant.shop.product.details', $product->slug)}}"> {!! product_limited_text($product->name) !!} </a>
                            </h5>

                            {!! render_product_star_rating_markup_with_count($product) !!}

                            <div class="price-update-through mt-3">
                                <span class="flash-prices color-three"> {{amount_with_currency_symbol(calculatePrice($sale_price, $product))}} </span>
                                <span class="flash-old-prices"> {{$regular_price != null ? amount_with_currency_symbol($regular_price) : ''}} </span>
                            </div>

                            <div class="btn-wrapper">
                                @if($product->inventory_detail_count < 1)
                                    <a href="javascript:void(0)" data-product_id="{{ $product->id }}" class="cmn-btn cmn-btn-outline-three radius-0 mt-3 add-to-cart-btn"> {{__('Add to Cart')}} </a>
                                @else
                                    <a href="javascript:void(0)" data-action-route="{{ route('tenant.products.single-quick-view', $product->slug) }}" class="cmn-btn cmn-btn-outline-three radius-0 mt-3 product-quick-view-ajax"> {{__('Add to Cart')}} </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Trendy area end -->
--}}





<div class="urunler-module-main-div" data-padding-top="{{ $data['padding_top'] }}" data-padding-bottom="{{ $data['padding_bottom'] }}">
    <div class="urunler-module-inside-area">
        <div class="urun-kutulari-main">
            <div class="home-product-tabs">
                <div class="home-product-tablinks active" data-country="yeni">
                    <p data-title="yeni">{{ \App\Helpers\SanitizeInput::esc_html($data['title']) }}</p>
                </div>
            </div>
            <section id="home-product-tabs-wrapper" style="width: 100%;">
                <div class="wrapper_tabcontent">
                    <div id="yeni" class="home-product-tabcontent active">
                        <div class="home-product-tabcontent-in" style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
                            @foreach($data['products'] as $product)

                                @php
                                    $data = get_product_dynamic_price($product);
                                    $campaign_name = $data['campaign_name'];
                                    $regular_price = $data['regular_price'];
                                    $sale_price = $data['sale_price'];

                                    $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;
                                @endphp

                                <div class="cat-detail-products-box" >
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
                                    <div class="cat-detail-products-box-img">
                                        <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                            {!! render_image_markup_by_attachment_id($product->image_id, 'radius-0') !!}
                                        </a>
                                    </div>
                                    <div class="cat-detail-products-box-info">
                                        <div class="cat-detail-products-box-marka">
                                            <a href="marka/e-meyve/" style="color: #000000;">{{ get_static_option('site_title') }}</a>
                                        </div>
                                        <div class="cat-detail-products-box-h">
                                            <a href="{{route('tenant.shop.product.details', $product->slug)}}" style="color: #000000;">{{ $product->name }}</a>
                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-fiyat">
                                        <div class="cat-detail-products-box-fiyat-out">
                                            @if($discount>0)
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    {{ amount_with_currency_symbol($regular_price)}}
                                                </div>
                                            @else
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0; visibility: hidden">Hide</div>
                                            @endif
                                            <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000;">
                                                {{amount_with_currency_symbol(calculatePrice($sale_price, $product))}}
                                            </div>
                                        </div>
                                        @if($discount>0)
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!">
                                                % {{ $discount }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="about-module-main-div">
    <div class="about-module-inside-area">
    </div>
</div>









{{--<div class="urunler-module-main-div" data-padding-top="{{ $data['padding_top'] }}" data-padding-bottom="{{ $data['padding_bottom'] }}">
    <div class="urunler-module-inside-area">
        <div class="urun-kutulari-main"><!-- Tablar !-->
            <div class="home-product-tabs">
                <div class="home-product-tablinks  active" data-country="yeni">
                    <p data-title="yeni">{{\App\Helpers\SanitizeInput::esc_html($data['title']) ?? ''}}</p>
                </div>
            </div>
            <section id="home-product-tabs-wrapper" style="width: 100%;  ">
                <div class="wrapper_tabcontent">
                    <div id="yeni" class="home-product-tabcontent active">
                        <div class="home-product-tabcontent-in">
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="749">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="749"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-premium-cay-1.8 kq-P749">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-ceylon-cay-180057758469278866.png"
                                             data-original="images/product/product_eminent-ceylon-cay-180057758469278866.png"
                                             alt="Eminent Premium Çay 1.8 kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-premium-cay-1.8 kq-P749" style="color: #000000;">
                                            Eminent Premium Çay 1.8 kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">45.00</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">39.00</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 13
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="748">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="748"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-artisan-ceylon-cay-500qr-P748">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-ceylon-cay-500-172967889525693.png"
                                             data-original="images/product/product_eminent-ceylon-cay-500-172967889525693.png"
                                             alt="Eminent Artisan Ceylon Çay 500qr">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-artisan-ceylon-cay-500qr-P748" style="color: #000000;">
                                            Eminent Artisan Ceylon Çay 500qr </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">33.00</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">28.00</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 15
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="747">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="747"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-artisan-ceylon-cay-450qr-P747">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-ceylon-cay-450-1487698749436.png"
                                             data-original="images/product/product_eminent-ceylon-cay-450-1487698749436.png"
                                             alt="Eminent Artisan Ceylon Çay 450qr">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-artisan-ceylon-cay-450qr-P747" style="color: #000000;">
                                            Eminent Artisan Ceylon Çay 450qr </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">45.00</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">37.00</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 17
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="746">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="746"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-ceylon-cay-1000qr-P746">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-ceylon-cay-1000qr-cay35512897578204.png"
                                             data-original="images/product/product_eminent-ceylon-cay-1000qr-cay35512897578204.png"
                                             alt="Eminent Ceylon Çay 1000qr">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-ceylon-cay-1000qr-P746" style="color: #000000;">
                                            Eminent Ceylon Çay 1000qr </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">48.00</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">38.00</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 20
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="745">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="745"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-ceylon-cay-250qr-P745">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-ceylon-cay-250qr-cay54292155148717.png"
                                             data-original="images/product/product_eminent-ceylon-cay-250qr-cay54292155148717.png"
                                             alt="Eminent Ceylon Çay 250qr">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-ceylon-cay-250qr-P745" style="color: #000000;">
                                            Eminent Ceylon Çay 250qr </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">29.00</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="744">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="744"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="eminent-qara-cay-500qr-P744">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_eminent-qara-cay-500qr-cay23631336837739.png"
                                             data-original="images/product/product_eminent-qara-cay-500qr-cay23631336837739.png"
                                             alt="Eminent Qara Çay 500qr">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-h">
                                        <a href="eminent-qara-cay-500qr-P744" style="color: #000000;">
                                            Eminent Qara Çay 500qr </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">26.00</span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="734">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="734"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-cəhrayi-4-1-kq-P734">
                                        <img class="lazy"
                                             src="https://e-meyve.az/images/product/product_pomidor-cehray%C4%B1-437357988252383.jpg"
                                             data-original="images/product/product_pomidor-cehrayı-437357988252383.jpg"
                                             alt="Pomidor Çəhrayı 4   1 kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-cəhrayi-4-1-kq-P734" style="color: #000000;">
                                            Pomidor Çəhrayı 4 1 kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">4.00</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.35</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 16
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="733">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="733"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-zirə-9-luq-vip-1kq-P733">
                                        <img class="lazy" src="https://e-meyve.az/images/product/no-img.jpg"
                                             data-original="images/product/no-img.jpg" alt="Pomidor Zirə 9-luq Vip 1kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-zirə-9-luq-vip-1kq-P733" style="color: #000000;">
                                            Pomidor Zirə 9-luq Vip 1kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">4.10</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.80</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 7
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="732">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="732"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-zirə-9-luq-1-kq-P732">
                                        <img class="lazy" src="https://e-meyve.az/images/product/no-img.jpg"
                                             data-original="images/product/no-img.jpg" alt="Pomidor Zirə 9-luq 1 kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-zirə-9-luq-1-kq-P732" style="color: #000000;">
                                            Pomidor Zirə 9-luq 1 kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">3.65</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.35</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 8
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="730">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="730"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-zirə-8-lik-P730">
                                        <img class="lazy" src="https://e-meyve.az/images/product/no-img.jpg"
                                             data-original="images/product/no-img.jpg" alt="Pomidor Zirə 8-lik">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-zirə-8-lik-P730" style="color: #000000;">
                                            Pomidor Zirə 8-lik </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">3.50</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.20</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 8
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="729">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="729"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-zirə-8-lik-vip-1-kq-P729">
                                        <img class="lazy" src="https://e-meyve.az/images/product/no-img.jpg"
                                             data-original="images/product/no-img.jpg"
                                             alt="Pomidor Zirə 8-lik Vip 1 kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-zirə-8-lik-vip-1-kq-P729" style="color: #000000;">
                                            Pomidor Zirə 8-lik Vip 1 kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">3.90</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.55</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 8
                                    </div>
                                </div>

                            </div>
                            <div class="cat-detail-products-box">
                                <div class="cat-detail-products-box-cart-1">
                                    <form action="addtocart" method="post">
                                        <input name="product_code" type="hidden" value="727">
                                        <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                        <input name="quantity" type="hidden" value="1">
                                        <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET">
                                            <i class="las la-shopping-basket"></i>
                                        </button>
                                    </form>

                                    <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right"
                                       data-tooltip="Seçilmişlərə əlavə et">
                                        <i class="las la-heart"></i>
                                    </a>

                                    <a href="#" class="tooltip-right product-compare" data-code="727"
                                       data-tooltip="Müqayisə et">
                                        <i class="las la-random"></i>
                                    </a>


                                </div>
                                <div class="cat-detail-products-box-img ">
                                    <div class="cat-detail-products-box-kargo">
                                        <i class="las la-truck"></i> Pulsuz Çatdırılma
                                    </div>
                                    <a href="pomidor-zirə-7-lik-vip-1-kq-P727">
                                        <img class="lazy" src="https://e-meyve.az/images/product/no-img.jpg"
                                             data-original="images/product/no-img.jpg"
                                             alt="Pomidor Zirə 7-lik Vip 1 kq">
                                    </a>
                                </div>

                                <div class="cat-detail-products-box-info">


                                    <div class="cat-detail-products-box-marka">
                                        <a href="marka/e-meyve/" style="color: #000000;">
                                            E-Meyvə </a>
                                    </div>
                                    <div class="cat-detail-products-box-h">
                                        <a href="pomidor-zirə-7-lik-vip-1-kq-P727" style="color: #000000;">
                                            Pomidor Zirə 7-lik Vip 1 kq </a>
                                    </div>
                                </div>
                                <div class="cat-detail-products-box-fiyat">
                                    <div class="cat-detail-products-box-fiyat-out">
                                        <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                            ₼ <span id="item-price">3.80</span>
                                        </div>
                                        <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                            ₼ <span id="item-price">3.50</span>

                                        </div>
                                    </div>
                                    <div class="cat-detail-products-box-indirim tooltip-bottom"
                                         data-tooltip="Məhsul satışdadır!">
                                        % 7
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section><!-- Tablar SON !--></div>
    </div>
</div>
<div class="about-module-main-div ">
    <div class="about-module-inside-area">
    </div>
</div>--}}
