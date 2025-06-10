<div class="shop-sidebar-content">
    <div class="shop-close-main">
        <div class="close-bars"><i class="las la-times"></i></div>
        <style>
            .ui-range-slider .noUi-origin.noUi-connect {
                background: #000 !important;
            }

            .ui-range-slider .noUi-origin.noUi-connect .noUi-handle.noUi-handle-lower, .ui-range-slider .noUi-origin.noUi-background .noUi-handle.noUi-handle-upper {
                background: #000 !important;
                top: -10px;
            }


            .category-sub-design-box > li.active {
                background: #558cff;
            }

            .category-sub-design-box > li.active > a {
                color: #ffffff;
            }

            .size-lists {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                gap: 10px;
                margin-top: 30px;
            }

            .size-lists .list a {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                height: 30px;
                width: 30px;
                font-size: 15px;
                background: #fff;
                color: #000;
                border: 1px solid;
                border-radius: 0;
            }

            .size-lists .list:hover a, .size-lists .list.active a {
                border: 2px solid var(--main-color-one);
                color: var(--main-color-one);
                font-weight: 500;
            }

            .single-shop-left .shop-left-title .shop-left-list .tag-lists .list a {
                color: #333333;
            }

            .single-shop-left .shop-left-title .shop-left-list .tag-lists .list a:hover,
            .single-shop-left .shop-left-title .shop-left-list .tag-lists .list.active a {
                background-color: #558cff;
            }

            .tag-lists .list {

            }

            .tag-lists .list:hover {
                background-color: #558cff !important;
            }

            .tag-lists .list a {
                border: 1px solid rgba(221, 221, 221, 0.5);
                font-size: 13px !important;
                padding: 7px 10px;
                display: inline-block;
                -webkit-transition: all 300ms;
                transition: all 300ms;
                font-weight: 600;
            }

            .tag-lists .list a:hover {
                border: 2px solid var(--main-color-one);
                color: #fff !important;
            }

        </style>

        <div class="cat-left-main ">
            @if(count($categories) > 0)


            <div class="cat-left-box-main ">
                <div class="cat-left-box-h">{{__('Sub Category')}}
                    <div style="width: 30px; height: 3px; background-color: #000000; margin-top: 7px;  "></div>
                </div>
                <ul class="category-lists active-list category-sub-design-box">
                    @foreach($categories as $category)
                        <li class="list category-sub-design-box"
                            data-slug="{{$category->slug}}" data-value="{{ $category->name }}">
                            <a href="javascript:void(0)" class="item">
                        <span data-value="{{ $category->name }}" data-slug="{{$category->slug}}"
                              class="ad-values"> {{$category->name}} </span>
                                <span> {{$category->product_count}} </span>
                            </a>
                        </li>

                    @endforeach
                </ul>

            </div>
            @endif
            <div class="cat-left-box-main">
                <div class="cat-left-box-h">{{__('Prices')}}
                    <div style="width: 30px; height: 3px; background-color: #000000; margin-top: 7px;  "></div>
                </div>
                <div class="cat-left-box-out-first">

                    <form class="price-range-slider mt-4" method="post" data-start-min="0" data-start-max="10000"
                          data-min="0"
                          data-max="10000" data-step="5">
                        <div class="ui-range-slider"></div>
                        <div class="ui-range-slider-footer price-wrap p-0">
                            <input id="one" type="hidden" value="0">
                            <input id="two" type="hidden" value="10000">
                            <div class="ui-range-values d-flex justify-content-between">
                                <div
                                    class="ui-range-value-min price-wrap-outputbox fs-14 m-0">{{site_currency_symbol()}}
                                    <span class="min_price">0</span>
                                    <input class="min-price-for-filter" type="hidden" value="0">
                                </div>
                                <div
                                    class="ui-range-value-max price-wrap-outputbox fs-14 m-0">{{site_currency_symbol()}}
                                    <span class="max_price">10000</span>
                                    <input class="max-price-for-filter" type="hidden" value="10000">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if(count($sizes) > 0)

                <div class="cat-left-box-main">
                    <div class="cat-left-box-h">{{__('Size')}}
                        <div style="width: 30px; height: 3px; background-color: #000000; margin-top: 7px;  "></div>
                    </div>
                    <div class="shop-left-list margin-top-15">
                        <ul class="size-lists active-list">
                            @foreach($sizes as $size)
                                <li class="list" data-slug="{{$size->id}}" data-value="{{ $size->size_code }}"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="{{ucfirst($size->name)}}">
                                    <a class="radius-5" href="javascript:void(0)"> {{$size->size_code}} </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            {{--<div class="single-shop-left mt-5 cat-left-box-main">
                 <div class="shop-left-title open">
                     <div class=" cat-left-box-h"> {{__('Tags')}} </div>
                     <div style="width: 30px; height: 3px; background-color: #000000; margin-top: 7px; "></div>
                     <div class="shop-left-list margin-top-15">
                         <ul class="tag-lists active-list">
                             @foreach($tags as $tag)
                                 <li class="list" data-slug="{{$tag->tag_name}}">
                                     <a class="radius-0 text-capitalize" href="javascript:void(0)"> {{$tag->tag_name}} </a>
                                 </li>
                             @endforeach
                         </ul>
                     </div>
                 </div>
             </div>--}}
            @if(count($tags) > 0 && isset($tags[0]) && $tags[0]->tag_name != '')
                <div class="single-shop-left cat-left-box-main">
                    @if(isset($tags) && $tags->isNotEmpty())
                        <div class="shop-left-title open">
                            <div class="cat-left-box-h">{{ __('Tags') }}
                                <div
                                    style="width: 30px; height: 3px; background-color: #000000; margin-top: 7px;"></div>
                            </div>
                            <div class="shop-left-list margin-top-15">
                                <ul class="tag-lists active-list">
                                    @foreach($tags as $tag)
                                        @if(!empty($tag->tag_name))
                                            <li class="list" data-slug="{{$tag->tag_name}}">
                                                <a class="radius-0 text-capitalize"
                                                   href="javascript:void(0)">{{$tag->tag_name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

