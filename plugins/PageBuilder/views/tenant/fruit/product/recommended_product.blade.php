<div class="group-urun-module-main-div" data-padding-top="{{ $data['padding_top'] }}"
     data-padding-bottom="{{ $data['padding_bottom'] }}">
    <div class="group-urun-module-inside-area">
        <div class="urun-kutulari-main">

            @php
                $image1_url = get_attachment_image_by_id($data['image_1']);
                $image2_url = get_attachment_image_by_id($data['image_2']);
            @endphp

                <!-- Section 1 -->
            <div class="group-product-main-box">
                <a href="{{ \App\Helpers\SanitizeInput::esc_html($data['image_1_url']) ?? 'javascript:void(0)' }}"
                   style="color: #000000;">
                    <div class="group-product-main-box-img">
                        <img src="{{ $image1_url['img_url'] ?? '' }}" alt="Sizin üçün tövsiyə olunur">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-header">
                        <div class="group-product-main-box-container-header-left">
                            <div class="group-product-main-box-container-header-left-h" style="color: #000000;">
                                {{ \App\Helpers\SanitizeInput::esc_html($data['title']) ?? '' }}
                            </div>
                        </div>
                    </div>
                    <div class="group-product-main-box-container-boxex">
                        <div class="swiper-product-list" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper">
                                @foreach($data['section_1']['products'] as $product)

                                    @php
                                        $data1 = get_product_dynamic_price($product);
                                        $campaign_name = $data1['campaign_name'];
                                        $regular_price = $data1['regular_price'];
                                        $sale_price = $data1['sale_price'];

                                        $discount = $regular_price ? (100 - round(($sale_price / $regular_price) * 100)) : 0;
                                    @endphp



                                    <div class="swiper-slide" style="margin-right: 13px;">
                                        <div class="cat-detail-products-box-caturunvitrin w-100">
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
                                            <div class="cat-detail-products-box-caturunvitrin-img">
                                                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                                    {!! render_image_markup_by_attachment_id($product->image_id, 'radius-0') !!}
                                                </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-info">
                                                <div class="cat-detail-products-box-marka">
                                                    <a href="marka/e-meyve/"
                                                       style="color: #000000;">{{ get_static_option('site_title') }}</a>
                                                </div>
                                                <div class="cat-detail-products-box-caturunvitrin-h">
                                                    <a href="{{route('tenant.shop.product.details', $product->slug)}}"
                                                       style="color: #000000;">{{ $product->name }}</a>
                                                </div>
                                            </div>

                                            <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                                <div class="cat-detail-products-box-fiyat-out">

                                                    @if($discount>0)
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0;">
                                                            {{ amount_with_currency_symbol($regular_price)}}
                                                        </div>
                                                    @else
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0; visibility: hidden">Hide
                                                        </div>
                                                    @endif
                                                    <div class="cat-detail-products-box-fiyat-mevcut"
                                                         style="color: #000000;">
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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 2 -->
            <div class="group-product-main-box">
                <a href="{{ \App\Helpers\SanitizeInput::esc_html($data['image_2_url']) ?? 'javascript:void(0)' }}"
                   style="color: #000000;">
                    <div class="group-product-main-box-img">
                        <img src="{{ $image2_url['img_url'] ?? '' }}" alt="">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-boxex">
                        <div class="swiper-product-list" style="padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper">
                                @foreach($data['section_2']['products'] as $product)

                                    @php
                                        $data2 = get_product_dynamic_price($product);
                                        $campaign_name = $data2['campaign_name'];
                                        $regular_price = $data2['regular_price'];
                                        $sale_price = $data2['sale_price'];

                                        $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;
                                    @endphp


                                    <div class="swiper-slide" style="margin-right: 13px;">
                                        <div class="cat-detail-products-box-caturunvitrin w-100">
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
                                            <div class="cat-detail-products-box-caturunvitrin-img">
                                                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                                    {!! render_image_markup_by_attachment_id($product->image_id, 'radius-0') !!}
                                                </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-info">
                                                <div class="cat-detail-products-box-marka">
                                                    <a href="ja"
                                                       style="color: #000000;">{{ get_static_option('site_title') }}</a>
                                                </div>
                                                <div class="cat-detail-products-box-caturunvitrin-h">
                                                    <a href="{{ $product->link }}"
                                                       style="color: #000000;">{{ $product->name }}</a>
                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                                <div class="cat-detail-products-box-fiyat-out">


                                                    @if($discount>0)
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0;">
                                                            {{ amount_with_currency_symbol($regular_price)}}
                                                        </div>
                                                    @else
                                                        <div class="cat-detail-products-box-fiyat-eski"
                                                             style="color: #b0b0b0; visibility: hidden">Hide
                                                        </div>
                                                    @endif
                                                    <div class="cat-detail-products-box-fiyat-mevcut"
                                                         style="color: #000000;">
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
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{--

<div class="group-urun-module-main-div">
    <div class="group-urun-module-inside-area">

        <div class="urun-kutulari-main">
            <!-- Boxes !-->
            <div class="group-product-main-box">
                <a href="javascript:void(0)" style="color: #000000;">
                    <div class="group-product-main-box-img ">
                        <img src="https://e-meyve.az/images/uploads/banner_vegetables7448505984663.png"
                             alt="Sizin üçün tövsiyə olunur">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-header">
                        <div class="group-product-main-box-container-header-left">
                            <div class="group-product-main-box-container-header-left-h" style="color: #000000;">
                                Sizin üçün tövsiyə olunur
                            </div>
                            <div class="group-product-main-box-container-header-left-s" style="color: #999999;"></div>
                        </div>
                    </div>
                    <div class="group-product-main-box-container-boxex">

                        <!-- Ürün Kutu standart !-->
                        <!--  <========SON=========>>> Ürün Kutu standart SON !-->


                        <!-- Ürün Kutu Slider !-->
                        <div class="swiper-product-list swiper-container-initialized swiper-container-horizontal" style="height: auto !important; padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper" id="swiper-wrapper-88d621b37ce7289f" aria-live="off" style>
                                <div class="swiper-slide swiper-slide-active" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="1 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="699">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="699" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="ziresumari1kq-P699">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_zire-%C5%9Fumar%C4%B158023237188397.jpg" data-original="images/product/product_zire-şumarı58023237188397.jpg" alt="Zirə Şumarı 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">



                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="ziresumari1kq-P699" style="color: #000000;">
                                                    Zirə Şumarı 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">7.40</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">6.30</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 14                                    </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="2 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="632">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="632" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="agkelem-P632">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_a%C4%9F-k%C9%99l%C9%99m81836820657.jpg" data-original="images/product/product_ağ-kələm81836820657.jpg" alt="Ağ Kələm 0.5 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">



                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="agkelem-P632" style="color: #000000;">
                                                    Ağ Kələm 0.5 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">0.55</span>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="3 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="693">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="693" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="lobyayerli1kq-P693">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_lobya-yerli5450869387945.jpg" data-original="images/product/product_lobya-yerli5450869387945.jpg" alt="Lobya Yerli 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">


                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="lobyayerli1kq-P693" style="color: #000000;">
                                                    Lobya Yerli 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">6.80</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">2.50</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 63                                    </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="4 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="626">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="626" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="renglibiber1sortkq-P626">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_rengli-biber-1-sort4917767077818.jpg" data-original="images/product/product_rengli-biber-1-sort4917767077818.jpg" alt="Rəngli Bibər 1 sort kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">






                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="renglibiber1sortkq-P626" style="color: #000000;">
                                                    Rəngli Bibər 1 sort kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">5.80</span>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="5 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="642">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="642" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="badimcanbakikq-P642">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_badimcan-baki10804334217800.jpg" data-original="images/product/product_badimcan-baki10804334217800.jpg" alt="Badımcan Bakı kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">






                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="badimcanbakikq-P642" style="color: #000000;">
                                                    Badımcan Bakı kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">3.20</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">2.45</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 23                                    </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-88d621b37ce7289f" aria-disabled="false"></div>
                            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-88d621b37ce7289f" aria-disabled="true"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                        <!--  <========SON=========>>> Ürün Kutu Slider SON !-->
                    </div>
                </div>
            </div>



            <div class="group-product-main-box">
                <a href="javascript:void(0)" style="color: #000000;">
                    <div class="group-product-main-box-img ">
                        <img src="https://e-meyve.az/images/uploads/banner_300-5419833549585306.png" alt=" ">
                    </div>
                </a>
                <div class="group-product-main-box-container">
                    <div class="group-product-main-box-container-boxex">

                        <!-- Ürün Kutu standart !-->
                        <!--  <========SON=========>>> Ürün Kutu standart SON !-->


                        <!-- Ürün Kutu Slider !-->
                        <div class="swiper-product-list swiper-container-initialized swiper-container-horizontal" style="height: auto !important; padding-top: 20px; padding-bottom: 20px;">
                            <div class="swiper-wrapper" id="swiper-wrapper-5ef4411a461f12c2" aria-live="off" style>
                                <div class="swiper-slide swiper-slide-prev" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="1 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="663">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="663" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="banan0.5kq-P663">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_banan67123924814190.jpg" data-original="images/product/product_banan67123924814190.jpg" alt="Banan 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">



                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="banan0.5kq-P663" style="color: #000000;">
                                                    Banan 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">2.95</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">2.55</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 13                                    </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-active" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="2 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="674">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="674" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="almagolden1kq-P674">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_alma-golden40285526272753.jpg" data-original="images/product/product_alma-golden40285526272753.jpg" alt="Alma Golden 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">



                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="almagolden1kq-P674" style="color: #000000;">
                                                    Alma Golden 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">1.90</span>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide swiper-slide-next" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="3 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="668">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="668" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="armudalyanaq0.5kq-P668">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_alyanaq23227557262469.jpg" data-original="images/product/product_alyanaq23227557262469.jpg" alt="Armud Alyanaq 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">






                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="armudalyanaq0.5kq-P668" style="color: #000000;">
                                                    Armud Alyanaq 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">3.15</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">1.95</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 38                                    </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="4 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="653">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="653" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="portagalturk1kq-P653">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_portakal-turkiye57990399868278.jpg" data-original="images/product/product_portakal-turkiye57990399868278.jpg" alt="Portağal Türk 1 kq" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">


                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="portagalturk1kq-P653" style="color: #000000;">
                                                    Portağal Türk 1 kq                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-eski" style="color: #b0b0b0;">
                                                    ₼            <span id="item-price">4.00</span>
                                                </div>
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">3.60</span>

                                                </div>
                                            </div>
                                            <div class="cat-detail-products-box-indirim tooltip-bottom" data-tooltip="Məhsul satışdadır!" data-original-title="" title="">
                                                % 10                                    </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="swiper-slide" style="height: 100% !important; width: 226.5px; margin-right: 13px;" role="group" aria-label="5 / 5">
                                    <div class="cat-detail-products-box-caturunvitrin" style="width: 100%; margin:0; height: 100% !important ">

                                        <div class="cat-detail-products-box-cart-1">
                                            <form action="addtocart" method="post">
                                                <input name="product_code" type="hidden" value="597">
                                                <input name="token" type="hidden" value="37c54f9f79d9ff6641974223bcf09191">
                                                <input name="quantity" type="hidden" value="1">
                                                <button name="addtocart" class="tooltip-right" data-tooltip="SƏBƏTƏ ƏLAVƏ ET" data-original-title="" title="">
                                                    <i class="las la-shopping-basket"></i>
                                                </button>
                                            </form>

                                            <a href="" data-toggle="modal" data-target="#loginModal" class="tooltip-right" data-tooltip="Seçilmişlərə əlavə et" data-original-title="" title="">
                                                <i class="las la-heart"></i>
                                            </a>

                                            <a href="#" class="tooltip-right product-compare" data-code="597" data-tooltip="Müqayisə et" data-original-title="" title="">
                                                <i class="las la-random"></i>
                                            </a>


                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-img ">
                                            <a href="manqo-keut1ed-P597">
                                                <img class="lazy" src="https://e-meyve.az/images/product/product_manqo17788684652986.jpg" data-original="images/product/product_manqo17788684652986.jpg" alt="Manqo Keut 1 əd" style="">
                                            </a>
                                        </div>

                                        <div class="cat-detail-products-box-caturunvitrin-info">




                                            <div class="cat-detail-products-box-marka">
                                                <a href="marka/e-meyve/" style="color: #000000;">
                                                    E-Meyvə                                    </a>
                                            </div>
                                            <div class="cat-detail-products-box-caturunvitrin-h">
                                                <a href="manqo-keut1ed-P597" style="color: #000000;">
                                                    Manqo Keut 1 əd                            </a>
                                            </div>
                                        </div>
                                        <div class="cat-detail-products-box-caturunvitrin-fiyat">
                                            <div class="cat-detail-products-box-fiyat-out">
                                                <div class="cat-detail-products-box-fiyat-mevcut" style="color: #000000; ">

                                                    ₼            <span id="item-price">16.65</span>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="swiper-button-next swiper-button-disabled" tabindex="-1" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-5ef4411a461f12c2" aria-disabled="true"></div>
                            <div class="swiper-button-prev" tabindex="0" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-5ef4411a461f12c2" aria-disabled="false"></div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                        <!--  <========SON=========>>> Ürün Kutu Slider SON !-->
                    </div>
                </div>
            </div>
            <!--  <========SON=========>>> Boxes SON !-->
        </div>

    </div>
</div>

--}}
