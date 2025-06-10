@extends('tenant.admin.admin-master')
@section('title')
    {{__('Excel Import/Export')}}
@endsection
@section('site-title')
    {{__('Excel Import/Export')}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{global_asset('assets/tenant/backend/css/bootstrap-taginput.css')}}">
    <link rel="stylesheet" href="{{global_asset('assets/common/css/select2.min.css')}}">
    <x-media-upload.css/>
    <x-summernote.css/>
    <x-product::variant-info.css/>

    <style>
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        .icon-container {
            position: absolute;
            top: 20px;
            left: 50%;
        }

        .loading-icon {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            border: 0.55rem solid #ddd;
            border-top-color: #333;
            display: inline-block;
            margin: 0 8px;

            -webkit-animation-name: spin;
            -webkit-animation-duration: 1s;
            -webkit-animation-iteration-count: infinite;

            animation-name: spin;
            animation-duration: 1s;
            animation-iteration-count: infinite;
        }

        .full-circle {
            -webkit-animation-timing-function: cubic-bezier(0.6, 0, 0.4, 1);
            animation-timing-function: cubic-bezier(0.6, 0, 0.4, 1);
        }

        @media screen and (max-width: 700px) {
            .container {
                width: 100%;
            }
        }
    </style>
@endsection
@section('content')
    <div class="dashboard-top-contents">
        <div class="row">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="col-lg-12">
                <div class="top-inner-contents search-area top-searchbar-wrapper">
                    <div class="dashboard-flex-contetns">
                        <div class="dashboard-left-flex">
                            <h3 class="heading-three fw-500"> {{ __("Excel Import/Export") }} </h3>
                        </div>
                        <div class="dashboard-right-flex">
                            <div class="top-search-input">
                                <a class="btn btn-secondary btn-sm px-4 text-black"
                                   href="{{route('tenant.admin.product.download-xml')}}">{{__('XML Export')}}</a>
                                <a class="btn btn-info btn-sm px-4"
                                   href="{{route('tenant.admin.product.all')}}">{{__('Back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-products-add bg-white radius-20 mt-4">
        <div class="row g-4">
            <div class="col-md-12">
                <div class="row">
                    <div class="d-flex align-items-start mb-8 metainfo-inner-wrap">
                        <div class="w-100 nav flex-row justify-content-center nav-pills me-3" role="tablist"
                             aria-orientation="vertical">
                            <button class="nav-link activeTab"
                                    data-bs-toggle="pill"
                                    data-bs-target="#importExcel"
                                    type="button" role="tab" aria-selected="true">
                                {{ __('Import Excel') }}
                            </button>
                            <button class="nav-link"
                                    data-bs-toggle="pill"
                                    data-bs-target="#exportExcel"
                                    type="button" role="tab" aria-selected="true">
                                {{ __('Export Excel') }}
                            </button>
                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade show activeContent"
                             id="importExcel"
                             role="tablist">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('Import Excel') }}
                                </div>
                                <div class="card-body">
                                    <form action="{{ route("tenant.admin.product.excel-import") }}" method="POST"
                                          class="mb-4"
                                          enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group">
                                            <label for="importType">{{ __('Import Type') }}</label>
                                           <select id="importType" name="import_type" class="form-control">
                                               <option value="products">{{ __('Product') }}</option>
                                               <option value="variant">{{ __('Variant') }}</option>
                                           </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="importFile">{{ __('Select Excel File') }}</label>
                                            <input type="file" name="file" class="form-control-file" id="importFile"
                                                   accept=".xlsx, .xls">
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('Upload') }}</button>
                                    </form>
                                    <p>{{ __("You can download the sample template by clicking the button below.") }}</p>
                                    <p>
                                        <b>{{ __('Note:') }}</b> {{ __("Please do not delete the titles, only change the fields that require uploading.") }}
                                    </p>
                                    <a id="example-excel-link" href="{{ route('tenant.admin.product.excel-export-example') }}"
                                       class="btn btn-success">{{ __("Example Excel Template") }}</a>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade show"
                             id="exportExcel"
                             role="tablist">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('Export Excel') }}
                                </div>
                                <div class="card-body">
                                    <form action="{{ route("tenant.admin.product.excel-export") }}" method="POST">
                                       @csrf
                                        <div class="row">
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="id"
                                                           class="form-check-input export-column" checked="">
                                                    <span style="line-height: 1.5;">ID</span>
                                                </label>
                                            </div>
                                            <!-- Genel Bilgi -->
                                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
                                                @foreach(get_all_language() as $language)
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="name[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Name') . ' (' . $language->name . ')' }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="description[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Description') . ' (' . $language->name . ')'  }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="slug[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Slug') . ' (' . $language->name . ')'  }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="url[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">URL {{  ' (' . $language->name . ')'  }}</span>
                                                        </label>
                                                    </div>
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="brand[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Brand')  . ' (' . $language->name . ')'  }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $language = default_lang();
                                                @endphp
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="name[{{$language->slug}}]"
                                                               class="form-check-input export-column"
                                                               checked="">
                                                        <span
                                                            style="line-height: 1.5;">{{ __('Name') . ' (' . $language->name . ')' }}</span>
                                                    </label>
                                                </div>
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="description[{{$language->slug}}]"
                                                               class="form-check-input export-column"
                                                               checked="">
                                                        <span
                                                            style="line-height: 1.5;">{{ __('Description') . ' (' . $language->name . ')'  }}</span>
                                                    </label>
                                                </div>
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="slug[{{$language->slug}}]"
                                                               class="form-check-input export-column"
                                                               checked="">
                                                        <span
                                                            style="line-height: 1.5;">{{ __('Slug') . ' (' . $language->name . ')'  }}</span>
                                                    </label>
                                                </div>
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="url[{{$language->slug}}]"
                                                               class="form-check-input export-column"
                                                               checked="">
                                                        <span
                                                            style="line-height: 1.5;">URL {{  ' (' . $language->name . ')'  }}</span>
                                                    </label>
                                                </div>
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="brand[{{$language->slug}}]"
                                                               class="form-check-input export-column"
                                                               checked="">
                                                        <span
                                                            style="line-height: 1.5;">{{ __('Brand')  . ' (' . $language->name . ')'  }}</span>
                                                    </label>
                                                </div>
                                            @endif
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="status"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Status') }}</span>
                                                </label>
                                            </div>

                                            <!-- Fİyatlama -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="base_cost"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Base Cost') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="regular_price"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Regular Price') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="sale_price"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Sale Price') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="tax"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Tax') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="tax_classes"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Tax classes') }}</span>
                                                </label>
                                            </div>

                                            <!-- Resimler -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="feature_image"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Feature Image') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="image_gallery"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Image Gallery') }}</span>
                                                </label>
                                            </div>

                                            <!-- Envanter -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="sku"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('SKU') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="quantity"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Quantity') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="unit"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Unit') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="unit_of_measurement"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Unit Of Measurement') }}</span>
                                                </label>
                                            </div>

                                            <!-- Varyantlar -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="variant"
                                                           class="form-check-input export-column"  checked="">
                                                    <span
                                                        style="line-height: 1.5;">{{ __('Custom Inventory variant') }}</span>
                                                </label>
                                            </div>

                                            <!-- Kategoriler -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="category"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Category') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="sub_category"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Sub Category') }}</span>
                                                </label>
                                            </div>
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="child_category"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Child Category') }}</span>
                                                </label>
                                            </div>

                                            <!-- Teslimat Seçeneği -->
                                            <div class="mb-3 position-relative col-4">
                                                <label class="form-check">
                                                    <input type="checkbox" name="delivery_option"
                                                           class="form-check-input export-column"  checked="">
                                                    <span style="line-height: 1.5;">{{ __('Delivery Options') }}</span>
                                                </label>
                                            </div>

                                            <!-- Meta SEO -->
                                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
                                                @foreach(get_all_language() as $language)
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="meta_seo[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Meta SEO') . ' (' . $language->name . ')' }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $language = default_lang();
                                                @endphp
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="meta_seo[{{$language->slug}}]"
                                                               class="form-check-input export-column"  checked="">
                                                        <span style="line-height: 1.5;">{{ __('Meta SEO') }}</span>
                                                    </label>
                                                </div>
                                            @endif

                                            <!-- Kargo ve İade Politikası -->
                                            @if(!tenant() || in_array(tenant('theme_slug'), activeTheme()))
                                                @foreach(get_all_language() as $language)
                                                    <div class="mb-3 position-relative col-4">
                                                        <label class="form-check">
                                                            <input type="checkbox"
                                                                   name="policy_description[{{$language->slug}}]"
                                                                   class="form-check-input export-column"
                                                                   checked="">
                                                            <span
                                                                style="line-height: 1.5;">{{ __('Product Shipping and Return Policy') . ' (' . $language->name . ')'  }}</span>
                                                        </label>
                                                    </div>
                                                @endforeach
                                            @else
                                                @php
                                                    $language = default_lang();
                                                @endphp
                                                <div class="mb-3 position-relative col-4">
                                                    <label class="form-check">
                                                        <input type="checkbox"
                                                               name="policy_description[{{$language->slug}}]"
                                                               class="form-check-input export-column" checked="">
                                                        <span
                                                            style="line-height: 1.5;">{{ __('Product Shipping and Return Policy') }}</span>
                                                    </label>
                                                </div>
                                            @endif

                                        </div>

                                        <div>
                                            <button type="submit" class="btn btn-primary">{{ __('Download') }}</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-media-upload.markup/>
        @endsection

        @section('scripts')
            <script src="{{global_asset('assets/common/js/jquery-ui.min.js') }}" rel="stylesheet"></script>
            <script src="{{global_asset('assets/tenant/backend/js/bootstrap-taginput.min.js')}}"></script>
            <script src="{{global_asset('assets/common/js/select2.min.js')}}"></script>
            <script src="{{global_asset('assets/common/js/slugify.js')}}"></script>

            <x-media-upload.js/>
            <x-summernote.js/>
            <x-unique-checker user="tenant" selector="input[name=sku]" table="product_inventories" column="sku"/>

            <script>


                // todo:: listen changes event
                $(document).on('change', '.item_attribute_name', function () {
                    // todo:: get value from selected value
                    let value = $(this).find("option:selected").text();
                    // todo:: target variant container
                    let oldValue = $(this).closest(".inventory_item").find(`input[value=${value}]`);
                    // todo:: check old value length is bigger then 0 that mean's this value is already selected

                    let attribute_warning = $(this).parents('.row').siblings('.attribute-warning');
                    attribute_warning.css('color', 'black');

                    if (oldValue.length > 0) {
                        toastr.warning(`{{ __("You can't select same attribute within a same variant if you need then please create a new variant") }}`)
                        $(this).find("option").each(function () {
                            $(this).attr("selected", false)
                        })
                        $(this).find("option:first-child").attr("selected", true);

                        attribute_warning.css('color', 'red');

                        return false;
                    }

                    let terms = $(this).find('option:selected').data('terms');
                    let terms_html = '<option ><?php echo e(__("Select attribute value")); ?></option>';
                    terms.map(function (term) {
                        terms_html += '<option value="' + term + '">' + term + '</option>';
                    });
                    $(this).closest('.inventory_item').find('.item_attribute_value').html(terms_html);
                });

                document.getElementById('importType').addEventListener('change', function() {
                    var selectedValue = this.value;
                    var linkElement = document.getElementById('example-excel-link');
                    var uploadType = document.getElementById('uploadType');

                    console.log('geldi')
                    console.log(uploadType.value)
                    console.log('gitti')
                    // Seçilen değere göre href değerini ayarla
                    switch(selectedValue) {
                        case 'variant':
                            uploadType.value = 'variant';
                            linkElement.href = '{{ route('tenant.admin.product.excel-export-example-variant') }}';
                            break;
                        case 'product':
                        default:
                            uploadType.value = 'product';
                            linkElement.href = '{{ route('tenant.admin.product.excel-export-example') }}';
                            break;

                    }
                });


                $(document).ready(function () {
                    $('.select2').select2({
                        placeholder: '{{__('Select an option')}}',
                        language: {
                            noResults: function () {
                                return "{{__('No result found')}}"
                            }
                        }
                    });
                });


                let temp = false;
                $(document).on("change", ".dashboard-products-add .form--control", function () {
                    $(".dashboard-products-add .form--control").each(function () {
                        if ($(this).val() != '') {
                            temp = true;
                            return false;
                        } else {
                            temp = false;
                        }
                    })
                })

                $(document).ready(function () {
                    String.prototype.capitalize = String.prototype.capitalize || function () {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    }

                    $('#product-name , #product-slug').on('keyup', function () {
                        let title_text = $(this).val();
                        $('#product-slug').val(convertToSlug(title_text))
                    });

                    $(document).on('change', '.is_taxable_wrapper select[name=is_taxable]', function () {
                        $('.tax_classes_wrapper').toggle();
                        $('.tax_classes_wrapper select[name=tax_class]').prop('selectedIndex', 0);
                    });

                    $(document).on("submit", "#product-create-form", function (e) {
                        e.preventDefault();

                        send_ajax_request("post", new FormData(e.target), $(this).attr("data-request-route"), function () {
                        }, function (data) {
                            if (data.success) {
                                toastr.success("{{__('Product Created Successfully')}}");
                                toastr.success("{{__('You are redirected to product list page')}}");

                                $("#product-create-form").trigger("reset");
                                temp = false;
                                setTimeout(function () {
                                    window.location.href = "{{ route("tenant.admin.product.all") }}";
                                }, 1000);
                            } else if (data.restricted) {
                                toastr.error("{{__('Sorry you can not upload more products due to your product upload limit')}}");

                                let nav_product = $('.product-limits-nav');
                                nav_product.find('span').css({'color': 'red', 'font-weight': 'bold'});
                                nav_product.effect("shake", {direction: "up left", times: 2, distance: 3}, 500);
                            }
                        }, function (xhr) {
                            ajax_toastr_error_message(xhr);
                        });
                    })

                    let inventory_item_id = 0;
                    $(document).on("click", ".delivery-item", function () {
                        $(this).toggleClass("active");
                        $(this).effect("shake", {direction: "up", times: 1, distance: 2}, 500);
                        let delivery_option = "";
                        $.each($(".delivery-item.active"), function () {
                            delivery_option += $(this).data("delivery-option-id") + " , ";
                        })

                        delivery_option = delivery_option.slice(0, -3)

                        $(".delivery-option-input").val(delivery_option);
                    });

                    $(document).on("change", "#category", function () {
                        let data = new FormData();
                        data.append("_token", "{{ csrf_token() }}");
                        data.append("category_id", $(this).val());

                        send_ajax_request("post", data, '{{ route('tenant.admin.category.sub-category') }}', function () {
                            $("#sub_category").html("<option value=''>{{__('Select Sub Category')}}</option>");
                            $("#child_category").html("<option value=''>{{__('Select Child Category')}}</option>");
                            $("#select2-child_category-container").html('');
                        }, function (data) {
                            $("#sub_category").html(data.html);
                        }, function () {

                        });
                    });

                    $(document).on("change", "#sub_category", function () {
                        let data = new FormData();
                        data.append("_token", "{{ csrf_token() }}");
                        data.append("sub_category_id", $(this).val());

                        let child_category_wrapper = $("#child_category");
                        send_ajax_request("post", data, '{{ route('tenant.admin.category.child-category') }}', function () {
                            child_category_wrapper.parent().css('position', 'relative')
                            child_category_wrapper.parent().append(`<div class="icon-container text-center">
                                <div class="loading-icon full-circle"></div>
                            </div>`);

                            child_category_wrapper.html("<option value=''>{{__('Select Child Category')}}</option>");
                            $("#select2-child_category-container").html('');

                        }, function (data) {
                            child_category_wrapper.html(data.html);
                        }, function () {

                        });

                        child_category_wrapper.parent().css('position', 'unset');
                        $('.icon-container').remove();
                    });

                    $(document).on('click', '.badge-item', function (e) {
                        if ($(this).hasClass("active")) {
                            $(this).removeClass("active")
                            $("#badge_id_input").val('');
                        } else {
                            $(".badge-item").removeClass("active");
                            $(this).addClass("active");
                            $("#badge_id_input").val($(this).attr("data-badge-id"));
                        }

                        $(this).effect("shake", {direction: "up", times: 1, distance: 2}, 500);
                    });

                    $(document).on("click", ".close-icon", function () {
                        $('#media_upload_modal').modal('hide');
                    });


                    function send_ajax_request(request_type, request_data, url, before_send, success_response, errors) {
                        $.ajax({
                            url: url,
                            type: request_type,
                            headers: {
                                'X-CSRF-TOKEN': "{{csrf_token()}}",
                            },
                            beforeSend: (typeof before_send !== "undefined" && typeof before_send === "function") ? before_send : () => {
                                return "";
                            },
                            processData: false,
                            contentType: false,
                            data: request_data,
                            success: (typeof success_response !== "undefined" && typeof success_response === "function") ? success_response : () => {
                                return "";
                            },
                            error: (typeof errors !== "undefined" && typeof errors === "function") ? errors : () => {
                                return "";
                            }
                        });
                    }

                    function prepare_errors(data, form, msgContainer, btn) {
                        let errors = data.responseJSON;

                        if (errors.success != undefined) {
                            toastr.error(errors.msg.errorInfo[2]);
                            toastr.error(errors.custom_msg);
                        }

                        $.each(errors.errors, function (index, value) {
                            toastr.error(value[0]);
                        });
                    }


                    function ajax_toastr_error_message(xhr) {
                        $.each(xhr.responseJSON.errors, function (key, value) {
                            toastr.error((key.capitalize()).replace("-", " ").replace("_", " "), value);
                        });
                    }

                    function ajax_toastr_success_message(data) {
                        if (data.success) {
                            toastr.success(data.msg)
                        } else {
                            toastr.warning(data.msg);
                        }
                    }
                });

                $(window).bind('beforeunload', function () {
                    if (temp) {
                        return '{{__('Are you sure you want to leave?')}}';
                    }
                });
            </script>
@endsection
