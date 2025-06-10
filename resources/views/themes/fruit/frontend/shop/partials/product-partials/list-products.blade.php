<div id="tab-grid" class="tab-content-item">
    <div class="row mt-4">
        @foreach($products as $product)
            @php
                $data = get_product_dynamic_price($product);
                $campaign_name = $data['campaign_name'];
                $regular_price = $data['regular_price'];
                $sale_price = $data['sale_price'];
    /*                            $discount = $data['discount'];*/
                $discount = $regular_price ? 100 - round(($sale_price / $regular_price) * 100) : 0;

            @endphp

            <div class="cat-detail-products-box-list">
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
                <div class="cat-detail-products-box-img-list ">
                    <a href="{{route('tenant.shop.product.details', $product->slug)}}">
                        {!! render_image_markup_by_attachment_id($product->image_id, '', 'grid') !!}
                    </a>
                </div>

                <div class="cat-detail-products-box-info-list">


                    <div class="cat-detail-products-box-marka">
                        <a href="marka/e-meyve/" style="color: #000000;">
                            {{ get_static_option('site_title') }} </a>
                    </div>
                    <div class="cat-detail-products-box-h">
                        <a href="{{to_product_details($product->slug)}}"
                           style="color: #000000;">
                            {!! product_limited_text($product->name) !!} </a>
                    </div>
                </div>
                <div class="cat-detail-products-box-fiyat-list">
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

        {{--  <div class="category-pagination-out mt-60">
              <nav aria-label="Page navigation">
                  <ul class="pagination pagination-sm">
                      @if(count($links) > 1)
                          @foreach($links as $link)
                              <li class="page-item"><a data-page="{{ $loop->iteration }}"
                                                       class="page-link {{ $loop->iteration === $current_page ? "active" : ""}}"
                                                       href="{{ $link }}">{{ $loop->iteration }}</a></li>
                          @endforeach
                      @endif
                  </ul>
              </nav>
          </div>--}}

        {{-- <ul class="pagination">
             @if(count($links) > 1)
                 @foreach($links as $link)
                     <li class="page-item"><a data-page="{{ $loop->iteration }}" class="page-link {{ $loop->iteration === $current_page ? "active" : ""}}" href="{{ $link }}">{{ $loop->iteration }}</a></li>
                 @endforeach
             @endif
         </ul>--}}

        {{-- <div class="category-pagination-out mt-60">
             <nav aria-label="Page navigation">
                 <ul class="pagination pagination-sm">
                     @if(!empty($links))
                         @foreach($links as $link)
                             <li class="page-item {{ $loop->iteration === $current_page ? 'active' : '' }}">
                                 <a data-page="{{ $loop->iteration }}"
                                    class="page-link {{ $loop->iteration === $current_page ? 'active' : '' }}"
                                    href="{{ $link }}">
                                     {{ $loop->iteration }}
                                 </a>
                             </li>
                         @endforeach
                     @endif
                 </ul>
             </nav>
         </div>--}}

        <div class="category-pagination-out mt-60">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-sm">
                    @if(count($links) > 1)
                        @foreach($links as $link)
                            <li class="page-item {{ $loop->iteration === $current_page ? 'active' : '' }}">
                                <a data-page="{{ $loop->iteration }}"
                                   class="page-link {{ $loop->iteration === $current_page ? 'active' : '' }}"
                                   href="{{ $link }}">
                                    {{ $loop->iteration }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </nav>
        </div>

    </div>
</div>

