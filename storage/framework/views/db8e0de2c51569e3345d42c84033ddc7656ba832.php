<?php $__env->startSection('title'); ?>
    <?php echo e(__('All Product')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <style>
        .out_of_stock{
            background-color: #ff000014;
        }
        .custom-success-badge{
            background-color: #05cd99 !important;
        }
        .barcode-canvas-wrapper{
            overflow: auto;
        }

        .loading-icon {
            margin-left: 5px;
            font-size: inherit;
            animation: rotate 1s linear infinite;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard-recent-order">
        <div class="row">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.flash-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('flash-msg'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="col-md-12">
                <div class="recent-order-wrapper dashboard-table bg-white">
                    <div id="product-list-title-flex" class="product-list-title-flex d-flex flex-wrap align-items-center justify-content-between">
                        <h3 class="cursor-pointer"><?php echo e(__('Search Product Module')); ?> <i class="las la-angle-down"></i></h3>
                        <button id="product-search-button" type="submit" class="btn btn-info btn-sm"><?php echo e(__('Search')); ?></button>
                    </div>

                    <form id="product-search-form" class="row" action="<?php echo e(route("tenant.admin.product.search")); ?>" method="get">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-name"><?php echo e(__('Name')); ?></label>
                                <input name="name" class="form--control input-height-1" id="search-name" value="<?php echo e(request()->name ?? old("name")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-sku"><?php echo e(__('SKU')); ?></label>
                                <input name="sku" class="form--control input-height-1" id="search-sku" value="<?php echo e(request()->sku ?? old("sku")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-brand"><?php echo e(__('Brand')); ?></label>
                                <input name="brand" class="form--control input-height-1" id="search-brand" value="<?php echo e(request()->brand ?? old("brand")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-category"><?php echo e(__('Category')); ?></label>
                                <input name="category" class="form--control input-height-1" id="search-category" value="<?php echo e(old("category")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-sub_category"><?php echo e(__('Sub Category')); ?></label>
                                <input name="sub_category" class="form--control input-height-1" id="search-brand" value="<?php echo e(old("sub_category")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-category"><?php echo e(__('Child Category')); ?></label>
                                <input name="child_category" class="form--control input-height-1" id="search-category" value="<?php echo e(old("child_category")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-color"><?php echo e(__('Color Name')); ?></label>
                                <input name="color" class="form--control input-height-1" id="search-color" value="<?php echo e(old("color")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-size"><?php echo e(__('Size Name')); ?></label>
                                <input name="size" class="form--control input-height-1" id="search-size" value="<?php echo e(old("size")); ?>" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="search-is_inventory_warn_able" class="checkbox-label-1"><input type="checkbox" name="is_inventory_warn_able" class="form--checkbox-1" id="search-is_inventory_warn_able" value="<?php echo e(old("is_inventory_warn_able")); ?>" /> <?php echo e(__('Inventory Warning')); ?></label>
                            </div>

                            <div class="form-group">
                                <label for="search-refundable" class="checkbox-label-1"> <input type="checkbox" name="refundable" class="form--checkbox-1" id="search-refundable" value="<?php echo e(old("refundable")); ?>" /> <?php echo e(__('Refundable')); ?></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-1" for="search-from_price"><?php echo e(__('From Price')); ?></label>
                                        <input name="from_price" class="form--control input-height-1" id="search-from_price" value="<?php echo e(old("from_price")); ?>" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label-1" for="search-to_price"><?php echo e(__('TO Price')); ?></label>
                                        <input name="to_price" class="form--control input-height-1" id="search-to_price" value="<?php echo e(old("to_price")); ?>" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-date_range"><?php echo e(__('Created Date Range')); ?></label>
                                <input name="date_range" class="form--control input-height-1" id="search-date_range" value="<?php echo e(old("date_range")); ?>" />
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="label-1" for="search-order_by"><?php echo e(__('Order By')); ?></label>
                                <select name="order_by" class="form--control input-height-1" id="search-order_by" value="<?php echo e(old("order_by")); ?>">
                                    <option value=""><?php echo e(__('Select Order By Option')); ?></option>
                                    <option value="asc"><?php echo e(__('ASC')); ?></option>
                                    <option value="desc"><?php echo e(__('DESC')); ?></option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-12 mt-4">
                <div class="recent-order-wrapper dashboard-table bg-white">
                    <div class="product-list-title-flex d-flex flex-wrap align-items-center justify-content-between">
                        <h3><?php echo e(__('Product List')); ?></h3>
                    </div>
                    <div class="header-wrap d-flex flex-wrap justify-content-between">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <div class="d-flex bulk-delete-wrapper gap-2">
                            <div class="bulk-delete-select-rows d-flex gap-2 me-4">
                                <label for="number-of-item"><?php echo e(__('Number Of Rows')); ?></label>
                                <select name="count" id="number-of-item">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                            <div class="btn-wrapper-trash">
                                <a class="btn btn-danger btn-sm" href="<?php echo e(route('tenant.admin.product.trash.all')); ?>"><?php echo e(__('Trash')); ?> <?php echo e($trash ? "({$trash})" : ""); ?></a>
                            </div>
                            <a class="btn btn-info btn-sm" href="<?php echo e(route('tenant.admin.product.create')); ?>"><?php echo e(__('Add New Product')); ?></a>
                        </div>
                    </div>
                    <div class="table-wrap mt-4" id="product-table-body">
                        <?php echo view("product::search", compact("products","statuses")); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.table.status-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::table.status-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.table.bulk-action-js','data' => ['url' => route('tenant.admin.product.bulk.destroy')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::table.bulk-action-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('tenant.admin.product.bulk.destroy'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    <script>
        $(function (){
            $("#search-date_range").flatpickr({
                mode: "range",
                dateFormat: "Y-m-d",
            });

            $("#product-search-form").fadeOut();
            $(document).on("click","#product-list-title-flex h3", function (){
                $("#product-search-form").slideToggle();
            })

            $(document).ready(function (){
                $(".loader").hide();
            })

            $(document).on("click","#product-search-button", function (){
                $("#product-search-form").trigger("submit");
            });

            $(document).on("submit","#product-search-form", function (e){
                e.preventDefault();
                let form_data = $("#product-search-form").serialize().toString();
                form_data += "&count=" + $("#number-of-item").val();

                // product-table-body
                send_ajax_request("GET",null,$(this).attr("action") + "?" + form_data, () => {
                    // before send request
                    $(".loader").fadeIn();
                }, (data) => {
                    $("#product-table-body").html(data);
                    $(".loader").fadeOut();
                }, (data) => {
                    prepare_errors(data);
                });
            });

            $(document).on("change","#number-of-item", function (e){
                e.preventDefault();
                let form_data = $("#product-search-form").serialize().toString()
                form_data += "&count=" + $(this).val();

                // product-table-body
                send_ajax_request("GET",null,$("#product-search-form").attr("action") + "?" + form_data, () => {
                    // before send request
                    $(".loader").show();
                }, (data) => {
                    $("#product-table-body").html(data);
                    $(".loader").hide();
                }, (data) => {
                    prepare_errors(data);
                });
            });

            /*
            ========================================
                Row Remove Click Delete
            ========================================
            */
            $(document).on("click", ".pagination-list li a", function(e) {
                e.preventDefault();

                $(".pagination-list li a").removeClass("current");
                $(this).addClass("current");

                // product-table-body
                send_ajax_request("GET",null,$(this).attr("href"), () => {
                    // before send request
                    $(".loader").show();
                }, (data) => {
                    $("#product-table-body").html(data);
                    $(".loader").hide();
                }, (data) => {
                    prepare_errors(data);
                });
            });

            $(document).on("click", ".delete-row", function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        send_ajax_request("GET",null,$(this).data("product-url"), () => {
                            // before send request
                            toastr.warning("Request send please wait while");
                        }, (data) => {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );

                            let product = $(this).parent().parent().parent();
                            product.fadeOut();

                            setTimeout(() => {
                                product.remove();
                                $(".tenant_info").load(location.href + " .tenant_info");
                                ajax_toastr_success_message(data);
                            }, 800)

                        }, (data) => {
                            prepare_errors(data);
                        })
                    }
                });
            });

            $(document).on('click', '.action-icon a.barcode', function () {
                let el = $(this);

                let productBarcodeObj = {
                    barcode_base64_image: el.attr('data-barcode'),
                    product_name: el.attr('data-product-name'),
                    product_sku: el.attr('data-sku')
                };

                let barcodeModal = $('.barcode-modal');
                barcodeModal.find('.modal-header h5.modal-title').text(productBarcodeObj.product_name);
                barcodeModal.find('.barcode-wrapper img').attr('src', `data:image/png;base64,${productBarcodeObj.barcode_base64_image}`);
                barcodeModal.modal('show');

                updateCanvas(productBarcodeObj);
            });

            function updateCanvas(productBarcodeObj)
            {
                let canvas = document.getElementById("barcodeCanvas");
                let ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, 700, 200);

                ctx.fillStyle = "white";

                let base64Image = `data:image/png;base64,${productBarcodeObj.barcode_base64_image}`;
                let img = new Image();
                img.src = base64Image;
                img.onload = function() {
                    ctx.fillRect(0, 0, img.width + 100, img.height + 100)
                    ctx.drawImage(img, 50, 50);
                    downloadCanvasAsPNG(canvas, productBarcodeObj.product_sku);
                };
            }

            function downloadCanvasAsPNG(canvas, sku) {
                let link = $('.modal-footer a.download-barcode-btn');
                link.attr('download', `${sku}-barcode.png`);
                link.attr('href', canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"));
            }

            $(document).on('click', '.modal-footer a.download-barcode-btn', function () {
                let el = $(this);

                el.append(`<span class="loading-icon mdi mdi-loading"></span>`);

                setTimeout(() => {
                    $('.barcode-modal').modal('hide');
                    $('.loading-icon').remove();
                }, 1000);
            });

            function send_ajax_request(request_type, request_data, url, before_send, success_response, errors) {
                $.ajax({
                    url: url,
                    type: request_type,
                    headers: {
                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
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
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/index.blade.php ENDPATH**/ ?>