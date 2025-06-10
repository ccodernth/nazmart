@if($errors->any())
    <div class="alert alert-danger search-results-fields">
        <ul class="list-none">
            <button type="button" class="close btn-sm" data-bs-dismiss="alert">×</button>
            @foreach($errors->all() as $error)
                <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .shop-right .single-shops .shop-nice-select {
        color: #333333 !important;
    }

    .shop-right .single-shops .shop-nice-select::after {
        border-bottom: 2px solid #333333;
        border-right: 2px solid #333333;
    }

    selectder-filter-contents .selected-flex-list li {
        color: #fff !important;
    }

    .cat-left-box-out-filterbox-out a {
        padding: 1px 2px;
    }

</style>

<div class="row align-items-center justify-content-between">
    <div class="col-xl-6 col-lg-6">
       {{-- <div class="selectder-filter-contents click-hide-filter" style="display: none">
            <span> {{__('Selected Filter:')}}</span>
            <div class="selected-clear-items">
                <ul class="selected-flex-list" id="_porduct_fitler_item">

                </ul>
                <a class="click-hide-parent" data-filter="all" href="javascript:void(0)"> {{__('Clear All')}} </a>
            </div>
        </div>--}}
    </div>
    {{--<div class="col-xl-6 col-lg-6">
        <div class="shop-right">
            <div class="single-shops">

            </div>

        </div>
    </div>--}}
</div>

<div class="cat-right-elements-out ">
    <div class="cat-right-elements">
        <div class="cat-right-elements-left text-black">
           {{-- <div class="selectder-filter-contents click-hide-filter" style="display: none">
                <span> {{__('Selected Filter:')}}</span>
                <div class="selected-clear-items">
                    <ul class="selected-flex-list" id="_porduct_fitler_item">

                    </ul>
                    <a class="click-hide-parent" data-filter="all" href="javascript:void(0)"> {{__('Clear All')}} </a>
                </div>
            </div>--}}
        </div>
        <div class="shop-right">
            <div class="single-shops">
                <div class="shop-nice-select" id="nice-select" style="display: none;">
                    <select class="text-black">
                        <option value="3"> {{__('Sort By Date')}} </option>
                        <option value="1"> {{__('Sort By Name')}} </option>
                        <option value="2"> {{__('Sort By Popularity')}} </option>
                        <option value="4"> {{__('Lowest to Highest')}} </option>
                        <option value="5"> {{__('Highest to Lowest')}} </option>
                    </select>
                </div>
            </div>
            <div class="single-shops text-black">
                <ul class="shop-flex-icon tabs">
                    <li class="shop-icons" data-tab="tab-grid">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-bars"></i> </a>
                    </li>
                    <li class="shop-icons active" data-tab="tab-grid2">
                        <a href="javascript:void(0)" class="icon"> <i class="las la-border-all"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{--<div class="selectder-filter-contents click-hide-filter" style="display: none">
    <span> {{__('Selected Filter:')}}</span>
    <div class="selected-clear-items">
        <ul class="selected-flex-list" id="_porduct_fitler_item">

        </ul>
        <a class="click-hide-parent" data-filter="all" href="javascript:void(0)"> {{__('Clear All')}} </a>
    </div>
</div>--}}

<div class="cat-left-box-out-filterbox-out selectder-filter-contents click-hide-filter" style="display: none">
    <a href="javascript:void(0)" class="button-red" data-tooltip=""
       data-original-title="" title=""> {{--<span> {{__('Selected Filter:')}}</span>--}}
        <div class="selected-clear-items">
            <ul class="selected-flex-list" id="_porduct_fitler_item">

            </ul>
        </div>
    </a>
    <a href="javascript:void(0)" class="button-blue click-hide-parent" data-filter="all"> {{__('Clear All')}} </a>
</div>

{{--
<div class="cat-left-box-out-filterbox-out">
    <a href="https://e-meyve.az/pomidor/?s=1" class="button-red tooltip-bottom" data-tooltip="Filtri silin" data-original-title="" title="">Taksit Seçimi olanlar <i class="ion-backspace"></i></a>
    <a href="https://e-meyve.az/pomidor/" class="button-blue ">FİLTRLƏRİ SİLİN</a>
</div>
--}}
