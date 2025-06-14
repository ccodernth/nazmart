@extends('tenant.admin.admin-master')
@section('title')
    {{__('Edit Product - '. $product->name)}}
@endsection
@section('style')
    <link rel="stylesheet" href="{{ global_asset('assets/common/css/flatpickr.min.css') }}">
    <link rel="stylesheet" href="{{global_asset('assets/tenant/backend/css/bootstrap-taginput.css')}}">
    <x-digitalproduct::product-file-uploader.css/>
    <x-media-upload.css/>
    <x-summernote.css/>
@endsection
@section('content')
    @php
        $subCat = $product?->subCategory?->id ?? null;
        $childCat = $product?->childCategory?->pluck("id")->toArray() ?? null;
        $cat = $product?->category?->id ?? null;;
    @endphp
    <div class="dashboard-top-contents">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-inner-contents search-area top-searchbar-wrapper">
                    <div class="dashboard-flex-contetns">
                        <div class="dashboard-left-flex">
                            <h3 class="heading-three fw-500"> {{ __("Edit Products") }} </h3>
                        </div>
                        <div class="dashboard-right-flex">
                            <div class="top-search-input">
                                <a class="btn btn-info btn-sm px-4"
                                   href="{{route('tenant.admin.digital.product.all')}}">{{__('Back')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dashboard-products-add bg-white radius-20 mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row g-4 d-flex align-items-start">
                    <div class="col-xxl-2 col-xl-3 col-lg-12">
                        <div class="nav flex-column nav-pills border-1 radius-10 me-3" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-general-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-general-info-tab" type="button" role="tab"
                                    aria-controls="v-general-info-tab" aria-selected="true"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{__("General Info")}}
                            </button>
                            <button class="nav-link" id="v-pills-price-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-price-tab" type="button" role="tab" aria-controls="v-price-tab"
                                    aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Price & Tax") }}
                            </button>
                            <button class="nav-link" id="v-pills-additional-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-additional-tab" type="button" role="tab"
                                    aria-controls="v-additional-tab"
                                    aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Additional Fields") }}
                            </button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-categories-tab" type="button" role="tab"
                                    aria-controls="v-categories-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Categories") }}
                            </button>
                            <button class="nav-link" id="v-pills-images-tab-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-images-tab" type="button" role="tab" aria-controls="v-images-tab"
                                    aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("File & Images") }}
                            </button>
                            <button class="nav-link" id="v-pills-tags-and-label" data-bs-toggle="pill"
                                    data-bs-target="#v-tags-and-label" type="button" role="tab"
                                    aria-controls="v-tags-and-label" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Tags & Label") }}
                            </button>
                            <button class="nav-link" id="v-pills-meta-tag-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-meta-tag-tab" type="button" role="tab"
                                    aria-controls="v-meta-tag-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Product Meta") }}
                            </button>
                            <button class="nav-link" id="v-pills-policy-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-policy-tab" type="button" role="tab"
                                    aria-controls="v-policy-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> {{ __("Refund Policy") }}
                            </button>
                        </div>
                    </div>
                    <div class="col-xxl-10 col-xl-9 col-lg-12">
                        <form data-request-route="{{ route("tenant.admin.digital.product.update", $product->id) }}" method="post"
                              id="product-create-form">
                            @csrf
                            <input name="id" type="hidden" value="{{ $product?->id }}">

                            <div class="form-button text-end mb-4">
                                <button class="btn-sm btn btn-success">{{ __("Update Changes") }}</button>
                            </div>

                            <div class="tab-content margin-top-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-general-info-tab" role="tabpanel"
                                     aria-labelledby="v-general-info-tab">
                                    <x-digitalproduct::general-info :product="$product"/>
                                </div>
                                <div class="tab-pane fade" id="v-price-tab" role="tabpanel"
                                     aria-labelledby="v-price-tab">
                                    <x-digitalproduct::product-price :product="$product" :taxes="$data['taxes']"/>
                                </div>
                                <div class="tab-pane fade" id="v-additional-tab" role="tabpanel"
                                     aria-labelledby="v-additional-tab">
                                    <x-digitalproduct::product-additional-field :languages="$data['languages']" :product="$product" :authors="$data['authors']"/>
                                </div>
                                <div class="tab-pane fade" id="v-images-tab" role="tabpanel"
                                     aria-labelledby="v-images-tab">
                                    <x-digitalproduct::product-image :product="$product"/>
                                </div>

                                <div class="tab-pane fade" id="v-tags-and-label" role="tabpanel"
                                     aria-labelledby="v-tags-and-label">
                                    <x-digitalproduct::tags-and-badge :badges="$data['badges']" :tag="$data['tag']"
                                                               :singlebadge="$product?->badge_id"/>
                                </div>
                                <div class="tab-pane fade" id="v-categories-tab" role="tabpanel"
                                     aria-labelledby="v-categories-tab">
                                    <x-digitalproduct::categories :sub_categories="$sub_categories"
                                                           :categories="$data['categories']"
                                                           :child_categories="$child_categories"
                                                           :selected_child_cat="$childCat" :selected_sub_cat="$subCat"
                                                           :selectedcat="$cat"/>
                                </div>
                                <div class="tab-pane fade" id="v-meta-tag-tab" role="tabpanel"
                                     aria-labelledby="v-meta-tag-tab">
                                    <x-digitalproduct::meta-seo :meta_data="$product->metaData"/>
                                </div>
                                <div class="tab-pane fade" id="v-settings-tab" role="tabpanel"
                                     aria-labelledby="v-settings-tab">
                                    <x-digitalproduct::settings :product="$product"/>
                                </div>
                                <div class="tab-pane fade" id="v-policy-tab" role="tabpanel"
                                     aria-labelledby="v-policy-tab">
                                    <x-digitalproduct::policy :product="$product"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <x-media-upload.markup/>
        @endsection
        @section('scripts')
            <script src="{{ global_asset('assets/common/js/jquery-ui.min.js') }}" rel="stylesheet"></script>
            <script src="{{global_asset('assets/tenant/backend/js/bootstrap-taginput.min.js')}}"></script>
            <script src="{{ global_asset('assets/common/js/flatpickr.js') }}"></script>

            <x-digitalproduct::product-file-uploader.js/>
            <x-media-upload.js/>
            <x-summernote.js/>

            <script>
                $(document).ready(function () {
                    flatpickr(".flatpickr", {
                        altInput: true,
                        altFormat: "F j, Y",
                        dateFormat: "Y-m-d",
                    });

                    String.prototype.capitalize = String.prototype.capitalize || function () {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    }

                    let aria_name = "{{$data['aria_name']}}";
                    if (aria_name != '') {
                        $('.nav-link').removeClass('active');
                        $('.tab-pane ').removeClass('show active');

                        $('#v-pills-' + aria_name).addClass('active');
                        $('#v-' + aria_name).addClass('show active');
                    }

                    $('.general-meta').addClass('active');
                    $('.general-meta-pane').addClass('show active');

                    let file_name = '{{$product->file ?? ''}}';
                    $('.kwt-file__msg').text(file_name);

                    console.log('wdssdf gdfg dfg')
                    $(document).on('click', '.add_item_attribute', function (e) {
                        let container = $(this).closest('.inventory_item');
                        let attribute_name_field = container.find('.item_attribute_name');
                        let attribute_value_field = container.find('.item_attribute_value');
                        let attribute_name = attribute_name_field.find('option:selected').text();
                        let attribute_value = attribute_value_field.find('option:selected').text();

                        console.log('attribute_name_field', attribute_name_field)
                        let container_id = container.data('id');

                        if (!container_id) {
                            container_id = 0;
                        }

                        if (attribute_name_field.val().length && attribute_value_field.val().length) {
                            let attribute_repeater = '';
                            attribute_repeater += '<div class="form-row">';
                            attribute_repeater += '<input type="hidden" name="item_attribute_id[' + container_id + '][]" value="">';
                            attribute_repeater += '<div class="col">';
                            attribute_repeater += '<div class="form-group">';
                            attribute_repeater += '<input type="text" class="form-control" name="item_attribute_name[' + container_id + '][]" value="' + attribute_name + '" readonly />';
                            attribute_repeater += '</div>';
                            attribute_repeater += '</div>';
                            attribute_repeater += '<div class="col">';
                            attribute_repeater += '<div class="form-group">';
                            attribute_repeater += '<input type="text" class="form-control" name="item_attribute_value[' + container_id + '][]" value="' + attribute_value + '" readonly />';
                            attribute_repeater += '</div>';
                            attribute_repeater += '</div>';
                            attribute_repeater += '<div class="col-auto">';
                            attribute_repeater += '<button type="button" class="btn btn-danger remove_details_attribute"> x </button>';
                            attribute_repeater += '</div>';
                            attribute_repeater += '</div>';

                            container.find('.item_selected_attributes').append(attribute_repeater);

                            attribute_name_field.val('');
                            attribute_value_field.val('');
                        } else {
                            toastr.warning('@php echo e(__("Select both attribute name and value")); @endphp');
                        }
                    });

                    $(document).on('change', '.item_attribute_name', function () {
                        let terms = $(this).find('option:selected').data('terms');
                        let terms_html = '<option value=""><?php echo e(__("Select attribute value")); ?></option>';
                        terms.map(function (term) {
                            terms_html += '<option value="' + term + '">' + term + '</option>';
                        });
                        $(this).closest('.inventory_item').find('.item_attribute_value').html(terms_html);
                    })

                    $(document).on("submit", "#product-create-form", function (e) {
                        e.preventDefault();

                        send_ajax_request("post", new FormData(e.target), $(this).attr("data-request-route"), function () {
                            toastr.warning("Request sent successfully ");
                        }, function (data) {
                            if (data.success) {
                                let nav_aria_name = $('.nav-link.active').attr('aria-controls');
                                let changed_aria_name = nav_aria_name.replace('v-', '');

                                toastr.success(`{{__("Product updated Successfully")}}`);
                                // toastr.success(`{{__("You are redirected to product list page")}}`);
                                setTimeout(function () {
                                    let url = '{{route("tenant.admin.digital.product.edit", $product->id)}}';

                                    // window.location.href = url + '/' + changed_aria_name;
                                    window.location.href = url + '/' + changed_aria_name;
                                }, 1000)
                            }  else if (!data.success) {
                                toastr.error(data.msg);
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
                            $("#sub_category").html("<option value=''>Select Sub Category</option>");
                            $("#child_category").html("<option value=''>Select Child Category</option>");
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

                        send_ajax_request("post", data, '{{ route('tenant.admin.category.child-category') }}', function () {
                            $("#child_category").html("<option value=''>Select Child Category</option>");
                            $("#select2-child_category-container").html('');
                        }, function (data) {
                            $("#child_category").html(data.html);
                        }, function () {

                        });
                    });

                    $(document).on('click', '.custom-plus', function (){
                        let custom_wrapper = $('.custom-additional-field-row');

                        let option_name_text = '{{__("Option Name")}}';
                        let option_name_value = '{{__("Option Value")}}';
                        let custom_wrapper_option = `<div class="row custom-additional-field-row mt-4">
                                                    <div class="col-5">
                                                        <input type="text" class="form--control radius-10" value="" name="option_name[]"
                                                               placeholder="${option_name_text}">
                                                    </div>
                                                    <div class="col-5">
                                                        <input type="text" class="form--control radius-10" value="" name="option_value[]"
                                                               placeholder="${option_name_value}">
                                                    </div>
                                                    <div class="col-2">
                                                        <div class="custom-button d-flex gap-3">
                                                            <a class="btn btn-info custom-plus" href="javascript:void(0)"><span class="mdi mdi-plus"></span></a>
                                                            <a class="btn btn-danger custom-minus" href="javascript:void(0)"><span class="mdi mdi-minus"></span></a>
                                                        </div>
                                                    </div>
                                                </div>`;

                        $(custom_wrapper.parent()).append(custom_wrapper_option);
                    });

                    $(document).on('click', '.custom-minus', function (){
                        let custom_wrapper = $('.custom-additional-field-row');

                        if(custom_wrapper.length > 1)
                        {
                            $(this).closest('.row').remove();
                        }
                    });

                    $(document).on('click', '.badge-item', function (e) {
                        $(".badge-item").removeClass("active");
                        $(this).addClass("active");
                        $(this).effect("shake", {direction: "up", times: 1, distance: 2}, 500);
                        $("#badge_id_input").val($(this).attr("data-badge-id"));
                    });

                    $(document).on("click", ".close-icon", function () {
                        $('#media_upload_modal').modal('hide');
                    });

                    $(document).on('change' ,'#accessibility', function (){
                        let value = $(this).val();
                        let tax_price_div = $('#tax-price-info');

                        if(value === 'free')
                        {
                            tax_price_div.fadeOut();
                            tax_price_div.find('select#tax').val('');
                            tax_price_div.find('select').attr('selected', false);
                            tax_price_div.find('input').val('');
                        } else {
                            tax_price_div.fadeIn();
                        }
                    });

                    function send_ajax_request(request_type, request_data, url, before_send, success_response, errors) {
                        $.ajax({
                            url: url,
                            type: request_type,
                            headers: {
                                'X-CSRF-TOKEN': "4Gq0plxXAnBxCa2N0SZCEux0cREU7h4NHObiPH10",
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
                        })
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
            </script>
@endsection
