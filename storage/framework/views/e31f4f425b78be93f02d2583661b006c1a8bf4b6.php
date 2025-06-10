<?php $__env->startSection('title'); ?>
    <?php echo __('Edit Product').' - '.$product->name; ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(global_asset('assets/tenant/backend/css/bootstrap-taginput.css')); ?>">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php
        $subCat = $product?->subCategory?->id ?? null;
        $childCat = $product?->childCategory?->pluck("id")->toArray() ?? null;
        $cat = $product?->category?->id ?? null;
        $selectedDeliveryOption = $product?->delivery_option?->pluck("delivery_option_id")?->toArray() ?? [];
    ?>
    <div class="dashboard-top-contents">
        <div class="row">
            <div class="col-lg-12">
                <div class="top-inner-contents search-area top-searchbar-wrapper">
                    <div class="dashboard-flex-contetns">
                        <div class="dashboard-left-flex">
                            <h3 class="heading-three fw-500"> <?php echo e(__("Edit Products")); ?> </h3>
                        </div>
                        <div class="dashboard-right-flex">
                            <div class="top-search-input">
                                <a class="btn btn-info btn-sm px-4"
                                   href="<?php echo e(route('tenant.admin.product.all')); ?>"><?php echo e(__('Back')); ?></a>
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
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("General Info")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-price-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-price-tab" type="button" role="tab" aria-controls="v-price-tab"
                                    aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Price")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-images-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-images-tab" type="button" role="tab" aria-controls="v-images-tab"
                                    aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Images")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-inventory-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-inventory-tab" type="button" role="tab"
                                    aria-controls="v-inventory-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Inventory")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-tags-and-label" data-bs-toggle="pill"
                                    data-bs-target="#v-tags-and-label" type="button" role="tab"
                                    aria-controls="v-tags-and-label" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Tags & Label")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-attributes-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-attributes-tab" type="button" role="tab"
                                    aria-controls="v-attributes-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Attributes")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-categories-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-categories-tab" type="button" role="tab"
                                    aria-controls="v-categories-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Categories")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-delivery-option-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-delivery-option-tab" type="button" role="tab"
                                    aria-controls="v-delivery-option-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Delivery Option")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-meta-tag-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-meta-tag-tab" type="button" role="tab"
                                    aria-controls="v-meta-tag-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Product Meta")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-settings-tab" type="button" role="tab"
                                    aria-controls="v-settings-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Product Settings")); ?>

                            </button>
                            <button class="nav-link" id="v-pills-policy-tab" data-bs-toggle="pill"
                                    data-bs-target="#v-policy-tab" type="button" role="tab"
                                    aria-controls="v-policy-tab" aria-selected="false"><span
                                    style='font-size:15px; padding-right: 7px;'>&#9679;</span> <?php echo e(__("Shipping & Return Policy")); ?>

                            </button>
                        </div>
                    </div>
                    <div class="col-xxl-10 col-xl-9 col-lg-12">
                        <form data-request-route="<?php echo e(route("tenant.admin.product.edit", $product->id)); ?>" method="post"
                              id="product-create-form">
                            <?php echo csrf_field(); ?>
                            <input name="id" type="hidden" value="<?php echo e($product?->id); ?>">

                            <div class="form-button mb-4">
                                <button class="btn-sm btn btn-info"><?php echo e(__("Save Changes")); ?></button>
                            </div>

                            <div class="tab-content margin-top-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-general-info-tab" role="tabpanel"
                                     aria-labelledby="v-general-info-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.general-info','data' => ['brands' => $data['brands'],'product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::general-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['brands' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['brands']),'product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-price-tab" role="tabpanel"
                                     aria-labelledby="v-price-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.product-price','data' => ['product' => $product,'taxClasses' => $data['tax_classes']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::product-price'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product),'taxClasses' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['tax_classes'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-inventory-tab" role="tabpanel"
                                     aria-labelledby="v-inventory-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.product-inventory','data' => ['units' => $data['units'],'inventory' => $product?->inventory,'uom' => $product?->uom]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::product-inventory'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['units' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['units']),'inventory' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product?->inventory),'uom' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product?->uom)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-images-tab" role="tabpanel"
                                     aria-labelledby="v-images-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.product-image','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::product-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-tags-and-label" role="tabpanel"
                                     aria-labelledby="v-tags-and-label">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.tags-and-badge','data' => ['badges' => $data['badges'],'tag' => $data['tag'],'singlebadge' => $product?->badge_id]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::tags-and-badge'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['badges' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['badges']),'tag' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['tag']),'singlebadge' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product?->badge_id)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-attributes-tab" role="tabpanel"
                                     aria-labelledby="v-attributes-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.product-attribute','data' => ['inventorydetails' => $product?->inventory?->inventoryDetails,'colors' => $data['product_colors'],'sizes' => $data['product_sizes'],'allAttributes' => $data['all_attribute']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::product-attribute'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['inventorydetails' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product?->inventory?->inventoryDetails),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['product_colors']),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['product_sizes']),'allAttributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['all_attribute'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-categories-tab" role="tabpanel"
                                     aria-labelledby="v-categories-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.categories','data' => ['subCategories' => $sub_categories,'categories' => $data['categories'],'childCategories' => $child_categories,'selectedChildCat' => $childCat,'selectedSubCat' => $subCat,'selectedcat' => $cat]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::categories'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['sub_categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sub_categories),'categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['categories']),'child_categories' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($child_categories),'selected_child_cat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($childCat),'selected_sub_cat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($subCat),'selectedcat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($cat)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-delivery-option-tab" role="tabpanel"
                                     aria-labelledby="v-delivery-option-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.delivery-option','data' => ['selectedDeliveryOption' => $selectedDeliveryOption,'deliveryOptions' => $data['deliveryOptions']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::delivery-option'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['selected_delivery_option' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($selectedDeliveryOption),'deliveryOptions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['deliveryOptions'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-meta-tag-tab" role="tabpanel"
                                     aria-labelledby="v-meta-tag-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.meta-seo','data' => ['metaData' => $product->metaData]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::meta-seo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['meta_data' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->metaData)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-settings-tab" role="tabpanel"
                                     aria-labelledby="v-settings-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.settings','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::settings'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                                <div class="tab-pane fade" id="v-policy-tab" role="tabpanel"
                                     aria-labelledby="v-policy-tab">
                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.policy','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::policy'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.markup'); ?>
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
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('scripts'); ?>
            <script src="<?php echo e(global_asset('assets/common/js/jquery-ui.min.js')); ?>" rel="stylesheet"></script>
            <script src="<?php echo e(global_asset('assets/tenant/backend/js/bootstrap-taginput.min.js')); ?>"></script>
            <script src="<?php echo e(global_asset('assets/common/js/slugify.js')); ?>"></script>

            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media-upload.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media-upload.js'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.js'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.unique-checker','data' => ['user' => 'tenant','selector' => 'input[name=sku]','table' => 'product_inventories','column' => 'sku']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('unique-checker'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['user' => 'tenant','selector' => 'input[name=sku]','table' => 'product_inventories','column' => 'sku']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

            <script>
                // todo:: listen changes event
                $(document).on('change', '.item_attribute_name', function (){
                    console.log('sdsa sdsfd');
                    // todo:: get value from selected value
                    let value = $(this).find("option:selected").val();
                    // todo:: target variant container
                    let oldValue = $(this).closest(".inventory_item").find(`input[value=${value}]`);
                    // todo:: check old value length is bigger then 0 that mean's this value is already selected

                    console.log('value :', value)
                    console.log('oldValue :', oldValue)
                    let attribute_warning = $(this).parents('.row').siblings('.attribute-warning');
                    attribute_warning.css('color', 'black');

                    if(oldValue.length > 0){
                        toastr.warning(`<?php echo e(__("You can't select same attribute within a same variant if you need then please create a new variant")); ?>`)
                        $(this).find("option").each(function (){
                            $(this).attr("selected", false)
                        })
                        $(this).find("option:first-child").attr("selected", true);

                        attribute_warning.css('color', 'red');

                        return false;
                    }

                    let terms = $(this).find('option:selected').data('terms');
                    let terms_html = '<option value=""><?php echo e(__("Select attribute value")); ?></option>';
                    terms.map(function (term) {
                        terms_html += '<option value="' + term + '">' + term + '</option>';
                    });
                    $(this).closest('.inventory_item').find('.item_attribute_value').html(terms_html);
                });

                $(document).on('change', '.is_taxable_wrapper select[name=is_taxable]', function () {
                    $('.tax_classes_wrapper').toggle();
                    $('.tax_classes_wrapper select[name=tax_class]').prop('selectedIndex', 0);
                });

                $(document).ready(function () {
                    String.prototype.capitalize = String.prototype.capitalize || function () {
                        return this.charAt(0).toUpperCase() + this.slice(1);
                    }

                    let aria_name = "<?php echo e($data['aria_name']); ?>";
                    if (aria_name != '') {
                        $('.nav-link').removeClass('active');
                        $('.tab-pane ').removeClass('show active');

                        $('#v-pills-' + aria_name).addClass('active');
                        $('#v-' + aria_name).addClass('show active');
                    }

                    $('.general-meta').addClass('active');
                    $('.general-meta-pane').addClass('show active');


                    $(document).on('click', '.add_item_attribute', function (e) {
                        let container = $(this).closest('.inventory_item');
                        let attribute_name_field = container.find('.item_attribute_name');
                        let attribute_value_field = container.find('.item_attribute_value');
                        let attribute_name = attribute_name_field.find('option:selected').text();
                        let attribute_value = attribute_value_field.find('option:selected').text();

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
                            toastr.warning('<?php echo e(__("Select both attribute name and value")); ?>');
                        }
                    });

                    $(document).on("submit", "#product-create-form", function (e) {
                        e.preventDefault();

                        send_ajax_request("post", new FormData(e.target), $(this).attr("data-request-route"), function () {
                            toastr.warning(`<?php echo e(__("Request sent successfully")); ?>`);
                        }, function (data) {
                            if (data.success) {
                                let nav_aria_name = $('.nav-link.active').attr('aria-controls');
                                let changed_aria_name = nav_aria_name.replace('v-', '');

                                toastr.success(`<?php echo e(__("Product updated Successfully")); ?>`);
                                toastr.success(`<?php echo e(__("You are redirected to product list page")); ?>`);
                                setTimeout(function () {
                                    let url = '<?php echo e(route("tenant.admin.product.edit", $product->id)); ?>';
                                    window.location.href = url + '/' + changed_aria_name;
                                }, 1000)
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
                        data.append("_token", "<?php echo e(csrf_token()); ?>");
                        data.append("category_id", $(this).val());

                        send_ajax_request("post", data, '<?php echo e(route('tenant.admin.category.sub-category')); ?>', function () {
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
                        data.append("_token", "<?php echo e(csrf_token()); ?>");
                        data.append("sub_category_id", $(this).val());

                        send_ajax_request("post", data, '<?php echo e(route('tenant.admin.category.child-category')); ?>', function () {
                            $("#child_category").html("<option value=''>Select Child Category</option>");
                            $("#select2-child_category-container").html('');
                        }, function (data) {
                            $("#child_category").html(data.html);
                        }, function () {

                        });
                    });

                    $(document).on('click', '.repeater_button .add', function (e) {
                        let inventory_item = `<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.repeater','data' => ['colors' => $data['product_colors'],'sizes' => $data['product_sizes'],'allAvailableAttributes' => $data['all_attribute']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['product_colors']),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['product_sizes']),'all-available-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($data['all_attribute'])]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>`;

                        if (inventory_item_id < 1) {
                            inventory_item_id = $('.inventory_items_container .inventory_item').length;
                        }

                        $('.inventory_items_container').append(inventory_item);
                        $('.inventory_items_container .inventory_item:last-child').data('id', inventory_item_id + 1);
                    });

                    $(document).on('click', '.repeater_button .remove', function (e) {
                        if($('.repeater_button .remove').length > 1){
                            $(this).closest('.inventory_item').remove();
                        }
                    });

                    $(document).on('click', '.remove_details_attribute', function (e) {
                        $(this).parent().parent().remove();
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


                    function send_ajax_request(request_type, request_data, url, before_send, success_response, errors) {
                        $.ajax({
                            url: url,
                            type: request_type,
                            headers: {
                                'X-CSRF-TOKEN': `<?php echo e(csrf_token()); ?>`,
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

                        if (errors.success !== undefined) {
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/edit.blade.php ENDPATH**/ ?>