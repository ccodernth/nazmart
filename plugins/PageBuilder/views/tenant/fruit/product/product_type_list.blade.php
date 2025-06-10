{{--<!-- Store area Starts -->
<section class="stoere-area body-bg-2" data-padding-top="{{$data['padding_top']}}"
         data-padding-bottom="{{$data['padding_bottom']}}">
    <div class="container-three">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-three text-center">
                    <h2 class="title">
                        @if(!empty($data['title_line']))
                            <img class="line-round" src="{{title_underline_image_src()}}" alt="">
                        @endif

                        {{$data['title']}}</h2>
                </div>
            </div>
        </div>
        <div class="row margin-top-65">
            <div class="col-lg-12">
                <div class="product-list">
                    <ul class="product-button isootope-button justify-content-center colors-heading">
                        @php
                            $all = !empty($data['categories']) ? $data['categories']->pluck('id')->toArray() : '';
                            $allIds = implode(',', $all);
                        @endphp

                        <li class="list active"
                            data-limit="{{$data['product_limit']}}"
                            data-tab="all"
                            data-all-id="{{$allIds}}"
                            data-sort_by="{{$data['sort_by']}}"
                            data-sort_to="{{$data['sort_to']}}"
                            data-filter="*">{{__('All')}}</li>
                        @foreach($data['categories'] as $category)
                            <li class="list"
                                data-tab="{{$category->slug}}"
                                data-limit="{{$data['product_limit']}}"
                                data-sort_by="{{$data['sort_by']}}"
                                data-sort_to="{{$data['sort_to']}}">{{$category->name}} </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="imageloaded">
            <div class="row grid margin-top-40 markup_wrapper">
                @foreach($data['products'] ?? [] as $product)
                    @php
                        $data_info = get_product_dynamic_price($product);
                        $campaign_name = $data_info['campaign_name'];
                        $regular_price = $data_info['regular_price'];
                        $sale_price = $data_info['sale_price'];
                        $discount = $data_info['discount'];

                        if ($loop->odd)
                            {
                                $delay = '.1s';
                                $fadeClass = 'fadeInUp';
                            } else {
                                $delay = '.2s';
                                $fadeClass = 'fadeInDown';
                            }
                    @endphp

                    <div class="col-xl-3 col-md-4 col-sm-6 col-{{productCards()}} margin-top-30 grid-item st1 st2 st3 st4 wow {{$fadeClass}}" data-wow-delay="{{$delay}}">
                        <div class="signle-collection text-center padding-0">
                            <div class="collction-thumb">
                                <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                                    {!! render_image_markup_by_attachment_id($product->image_id, 'radius-0') !!}
                                </a>

                                @include(include_theme_path('shop.partials.product-options'))
                            </div>
                            <div class="collection-contents">
                                {!! mares_product_star_rating($product?->rating, 'collection-review color-three justify-content-center margin-bottom-10') !!}

                                <h2 class="collection-title color-three ff-playfair">
                                    <a href="{{route('tenant.shop.product.details', $product->slug)}}"> {!! product_limited_text($product->name, 'title') !!} </a>
                                </h2>
                                <div class="collection-bottom margin-top-15">
                                    @include(include_theme_path('shop.partials.product-options-bottom'))
                                    <h3 class="common-price-title color-three fs-20 ff-roboto"> {{amount_with_currency_symbol(calculatePrice($sale_price, $product))}} </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
<!-- Store area end -->



@section("scripts")
    <script>
        $(function () {
            $(document).on('click', '.product-list .list', function (e) {
                e.preventDefault();

                let el = $(this);
                let tab = el.data('tab');
                let limit = el.data('limit');
                let sort_by = el.data('sort_by');
                let sort_to = el.data('sort_to');
                let allId = el.data('all-id');

                $.ajax({
                    type: 'GET',
                    url: "{{route('tenant.category.wise.product.aromatic')}}",
                    data: {
                        category: tab,
                        limit: limit,
                        sort_by: sort_by,
                        sort_to: sort_to,
                        allId: allId
                    },
                    beforeSend: function () {
                        $('.loader').fadeIn(200);
                    },
                    success: function (data) {
                        let tab = $('li.list[data-tab='+data.category+']');
                        let markup_wrapper = $('.markup_wrapper');

                        $('li.list').removeClass('active');
                        tab.addClass('active');
                        markup_wrapper.hide();
                        markup_wrapper.html(data.markup);
                        markup_wrapper.fadeIn();
                        $('.loader').fadeOut(200);
                    },
                    error: function (data) {

                    }
                });
            });
        });
    </script>
@endsection--}}


<div class="product-categories-main-div-vitrin2">
    <div class="product-categories-inside-vitrin2">
        <!-- Modül başlıgı ve üst başlıgı !-->
        <div class="modules-head-text-main">
            <div class="modules-head-forbg-text-out" style="border-bottom: 1px solid #cccccc; ">
                <div class="modules-head-forbg-text " style="color: #000000;     background-color: #ffffff; ">#E-MEYVƏ
                </div>
            </div>
            <div class="modules-head-text-s" style="color: #999292; margin-bottom: 0;">Bağdan ən təzə sağlam
                məhsullar!
            </div>
        </div>
        <!-- Modül başlıgı ve üst başlıgı SON !-->
        <div class="product-categories-inside-vitrin2-boxarea">
            <!-- Box !-->
            <a class="col-md-4 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_219730523664730.png"
                         data-original="images/uploads/banner1_219730523664730.png" alt="1">
                </div>
            </a>
            <a class="col-md-4 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_380594484715410.png"
                         data-original="images/uploads/banner1_380594484715410.png" alt="2">
                </div>
            </a>
            <a class="col-md-4 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_183643381768974.png"
                         data-original="images/uploads/banner1_183643381768974.png" alt="Uşaq Məhsulları">
                </div>
            </a>
            <a class="col-md-12 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_banner2819601949175.png"
                         data-original="images/uploads/banner1_banner2819601949175.png" alt="Ağıllı Telefonlar">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #ffffff !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_3-1-50559107836624.png"
                         data-original="images/uploads/banner1_3-1-50559107836624.png" alt="Ev-Bağ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_463964352587156.png"
                         data-original="images/uploads/banner1_463964352587156.png" alt=" ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_1-3-70759428340495.png"
                         data-original="images/uploads/banner1_1-3-70759428340495.png" alt=" ">
                </div>
            </a>
            <a class="col-md-3 form-group  vitrin2-box" href="javascript:void(0)"
               style="color: #000000 !important; text-decoration: none;">
                <div class="vitrin2-box-img rounded">
                    <img class="lazy" src="https://e-meyve.az/images/uploads/banner1_2-1-69774279512610.png"
                         data-original="images/uploads/banner1_2-1-69774279512610.png" alt=" ">
                </div>
            </a>
            <!--  <========SON=========>>> Box SON !-->
        </div>
    </div>
</div>


<!--  ####################################################################   -->


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










