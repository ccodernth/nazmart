<style>
    .tenant_info {
        display: flex;
        align-items: center;
    }

    .tenant_info div:not(:last-child) {
        margin-right: 20px;
    }

    .tenant_info div span {
        font-size: 14px;
        font-weight: 500;
        color: #666;
    }

    .tenant_info div > span:first-child {
        font-weight: 700;
        color: var(--bs-info);
        margin-right: 5px;
        font-size: 15px;
    }

    .navbar .navbar-menu-wrapper {
        gap: 20px;
    }

    .warning-details-card i {
        font-size: 20px;
    }

    .warning-details-card .preview-thumbnail {
        padding: 5px;
    }

    .warning-details-card .preview-subject {
        margin-left: 5px;
    }
</style>

<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo e(route('tenant.admin.dashboard')); ?>">
            <?php
                $logo_type = !empty(get_static_option('dark_mode_for_admin_panel')) ? 'site_white_logo' : 'site_logo';
            ?>
            <?php echo render_image_markup_by_attachment_id(get_static_option($logo_type)); ?>

        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('tenant.admin.dashboard')); ?>">
            <?php echo render_image_markup_by_attachment_id(get_static_option('site_favicon')); ?>

        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
        </button>
        <div class="tenant_info d-flex">
            <?php
                $permission_limit = tenant()?->payment_log?->package;
                $page_count = \App\Models\Page::count();
                $blog_count = \Modules\Blog\Entities\Blog::count();
                $product_count = \Modules\Product\Entities\Product::withTrashed()->count();

                $page_limit = $permission_limit?->page_permission_feature == -1 ? __('Unlimited') : $permission_limit?->page_permission_feature;
                $blog_limit = $permission_limit?->blog_permission_feature == -1 ? __('Unlimited') : $permission_limit?->blog_permission_feature;
                $product_limit = $permission_limit?->product_permission_feature == -1 ? __('Unlimited') : $permission_limit?->product_permission_feature;
                $storage_limit = $permission_limit?->storage_permission_feature == -1 ? __('Unlimited') : $permission_limit?->storage_permission_feature;

                $storage_count = get_tenant_storage_info('mb');
                $storage_permission_feature = empty($permission_limit?->storage_permission_feature) ? 1 : $permission_limit?->storage_permission_feature;
                $storage_remaining_percent = 100-($storage_count/$storage_permission_feature)*100;

                // Inventory Warnings
                $threshold_amount = get_static_option('stock_threshold_amount');

                $inventory_product_items = \Modules\Product\Entities\ProductInventoryDetail::where('stock_count', '<', ($threshold_amount ?? 0)+1)
                ->whereHas('is_inventory_warn_able', function ($query) {
                    $query->where('is_inventory_warn_able', 1);
                })
                ->select('id', 'product_id')
                ->get();

                $inventory_product_items_id = !empty($inventory_product_items) ? $inventory_product_items->pluck('product_id')->toArray() : [];

                $products = \Modules\Product\Entities\Product::with('inventory')
                                ->where('is_inventory_warn_able', 1)
                                ->whereHas('inventory', function ($query) use ($threshold_amount) {
                                    $query->where('stock_count', '<', ($threshold_amount ?? 0) + 1);
                                })
                                ->select('id')
                                ->get();

                $products_id = !empty($products) ? $products->pluck('id')->toArray() : [];

                $every_filtered_product_id = array_unique(array_merge($inventory_product_items_id, $products_id));
                $all_products = \Modules\Product\Entities\Product::whereIn('id', $every_filtered_product_id)->select('id', 'name', 'is_inventory_warn_able')->get();
            ?>
            <div class="tenant_info_item" id="tenant_info_list">
                <span class="tenant_info_icon"> <i class="mdi mdi-lightbulb-on-outline"></i> </span>
                <div class="tenant_info_list">

                    <div class="tenant_info_list_item">
                        <span class="tenant_info_list_title"><?php echo e(__('Page:')); ?></span>
                        <span class="tenant_info_list_para"><?php echo e($page_count.'/'.$page_limit); ?></span>
                    </div>

                    <div class="tenant_info_list_item">
                        <span class="tenant_info_list_title"><?php echo e(__('Blog:')); ?></span>
                        <span class="tenant_info_list_para">
                            <span
                                class="<?php echo e($blog_count == $permission_limit?->blog_permission_feature ? 'text-danger' : ''); ?>"><?php echo e($blog_count); ?></span>
                            <span>/<?php echo e($blog_limit); ?></span>
                        </span>
                    </div>

                    <div class="tenant_info_list_item product-limits-nav">
                        <span class="tenant_info_list_title "><?php echo e(__('Product:')); ?></span>
                        <span class="tenant_info_list_para">
                            <span
                                class="<?php echo e($product_count == $permission_limit?->product_permission_feature ? 'text-danger' : ''); ?>"><?php echo e($product_count); ?></span>
                            <span>/<?php echo e($product_limit); ?></span>
                        </span>
                    </div>

                    <div class="tenant_info_list_item">
                        <span class="tenant_info_list_title"><?php echo e(__('Storage:')); ?></span>
                        <?php
                            $allocatedStorage = $permission_limit?->storage_permission_feature;
                            $oneThirdOfStorage = $allocatedStorage - ($allocatedStorage * 20) / 100;
                        ?>
                        <span class="tenant_info_list_para">
                            <span
                                class="<?php echo e($storage_remaining_percent >= $oneThirdOfStorage ? 'text-danger' : ''); ?>"><?php echo e(round($storage_count, 3)); ?></span>
                            <span>/<?php echo e($storage_limit != 'Unlimited' ? $allocatedStorage : $storage_limit); ?> MB</span>
                        </span>
                    </div>
                </div>
            </div>

            <input class="global-search-input form-control border-0" type="text" placeholder="Search..">
            <div class="search-dropdown dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                 aria-labelledby="messageDropdown" style="top: 80px"></div>
        </div>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <div class="nav-profile-img">
                        <?php if(auth('admin')->user()->image != null): ?>
                            <?php echo render_image_markup_by_attachment_id(optional(auth('admin')->user())->image,'','full',true); ?>

                        <?php else: ?>
                            <img src="<?php echo e(global_asset('assets/landlord/uploads/media-uploader/no-image.jpg')); ?>" alt="">
                        <?php endif; ?>
                        <span class="availability-status online"></span>
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black"><?php echo e(optional(auth('admin')->user())->name); ?></p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('tenant.admin.edit.profile')); ?>">
                        <i class="mdi mdi-account-settings me-2 text-success"></i> <?php echo e(__('Edit Profile')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('tenant.admin.change.password')); ?>">
                        <i class="mdi mdi-key me-2 text-success"></i> <?php echo e(__('Change Password')); ?>

                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"
                       onclick="event.preventDefault();
                           document.getElementById('tenanat_logout_submit_btn').dispatchEvent(new MouseEvent('click'));">
                        <i class="mdi mdi-logout me-2 text-primary"></i>
                        <?php echo e(__('Signout')); ?>

                        <form id="logout-form" action="<?php echo e(route('tenant.admin.logout')); ?>" method="POST" class="d-none">
                            <?php echo csrf_field(); ?>
                            <button class="d-none" type="submit" id="tenanat_logout_submit_btn"></button>
                        </form>
                    </a>
                </div>
            </li>

            <li class="nav-item d-none d-lg-block full-screen-link">
                <a class="nav-link">
                    <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                </a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="mdi mdi-email-outline"></i>
                    <?php if($new_message): ?>
                        <span class="count-symbol bg-warning"></span>
                    <?php endif; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="messageDropdown">

                    <h6 class="p-3 mb-0"><?php echo e($new_message. ' '.  __('Messages')); ?>  </h6>
                    <div class="dropdown-divider"></div>

                    <?php $__currentLoopData = $all_messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="dropdown-item preview-item"
                           href="<?php echo e(route(route_prefix().'admin.contact.message.view', $message->id)); ?>">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="las la-envelope"></i>
                                </div>
                            </div>
                            <?php
                                $fields = json_decode($message->fields,true);
                            ?>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject mb-1 font-weight-normal"><?php echo e(__('You have message from').' '); ?>

                                    <strong><?php echo e(optional($message->form)->title); ?></strong></h6>
                                <p class="text-gray mb-0"> <?php echo e($message->created_at->diffForHumans() . ' '); ?>  <?php if($message->status === 1): ?>
                                        <small class="mt-1 text-danger"><?php echo e('('.__('New' .')')); ?></small>
                                    <?php endif; ?></p>
                            </div>
                            <div class="dropdown-divider"></div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <h6 class="p-3 mb-0 text-center">
                                <a class="dropdown-item"
                                   href="<?php echo e(route(route_prefix().'admin.contact.message.all')); ?>"><?php echo e(__('See All')); ?></a>
                            </h6>
                        </a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                   data-bs-toggle="dropdown">
                    <i class="mdi mdi-bell-outline"></i>

                    <span
                        class="count-symbol <?php echo e(count($all_products) > 0 ? 'bg-danger' : ''); ?>"><?php echo e(count($all_products) > 0 ? count($all_products) : ''); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                     aria-labelledby="notificationDropdown">
                    <h6 class="p-3 mb-0"><?php echo e(__('Stock Reminder').' ('.count($all_products).')'); ?></h6>

                    <?php $__empty_1 = true; $__currentLoopData = $all_products->take(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $inventory = $product?->inventory?->stock_count;
                            $variant = $product->inventoryDetail->where('stock_count', '<=', $threshold_amount)->first();
                            $variant = !empty($variant) ? $variant->stock_count : [];

                            $stock = min($inventory, $variant);
                        ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item"
                           href="<?php echo e(route('tenant.admin.product.edit', $product->id).'/inventory-tab'); ?>">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="mdi mdi-cart-arrow-down"></i>
                                </div>
                            </div>
                            <div
                                class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                <h6 class="preview-subject font-weight-normal mb-1"><?php echo e($product->name); ?></h6>
                                <p class="text-gray ellipsis mb-0 text-danger"> <?php echo e(sprintf(__('Remaining stock is %u'), $stock)); ?> </p>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h6 class="p-3 mb-0 text-center"><?php echo e(__('No data available')); ?></h6>
                    <?php endif; ?>

                    <?php if(!empty($all_products) > 0): ?>
                        <h6 class="p-3 mb-0 text-center">
                            <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal"
                               data-bs-target="#warningModal"><?php echo e(__('See all warnings')); ?></a>
                        </h6>
                    <?php endif; ?>
                </div>
            </li>

            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-theme-light-dark"></i>
                </a>
            </li>
            <li class="d-none d-sm-block">
                <style>
                    .d-flex.align-items-start.mb-8.metainfo-inner-wrap {
                        margin-top: 30px;
                    }
                    .navbar-link, a.navbar-item {
                        cursor: pointer;
                    }
                    .navbar-item, .navbar-link {
                        color: #4a4a4a;
                        display: block;
                        line-height: 1.5;
                        padding: .5rem .75rem;
                        position: relative;
                    }
                    .navbar-item {
                        flex-grow: 0;
                        flex-shrink: 0;
                    }
                    a {
                        color: inherit;
                        cursor: pointer;
                        text-decoration: none;
                    }

                    .lang-dropdown .navbar-dropdown {

                    }

                    .lang-dropdown .navbar-dropdown .navbar-item {
                        display: flex;
                        align-items: center;
                    }

                    .lang-dropdown .navbar-dropdown .navbar-item img {
                        display: block;
                        height: 26px;
                        width: 26px;
                        min-width: 26px;
                        border-radius: 50%;
                    }

                    .lang-dropdown .navbar-dropdown .navbar-item span {
                        display: block;
                        margin-left: 10px;
                        margin-right: 10px;
                    }

                    .list {
                        background-color: inherit;
                        border-radius: inherit;
                        box-shadow: inherit;
                    }

                    .loader {
                        display: none;
                        z-index: 999999;
                    }

                    .block:not(:last-child), .box:not(:last-child), .breadcrumb:not(:last-child), .content:not(:last-child), .highlight:not(:last-child), .level:not(:last-child), .list:not(:last-child), .message:not(:last-child), .notification:not(:last-child), .pagination:not(:last-child), .progress:not(:last-child), .subtitle:not(:last-child), .table-container:not(:last-child), .table:not(:last-child), .tabs:not(:last-child), .title:not(:last-child) {
                        margin-bottom: inherit;
                    }

                    .button.is-loading::after, .control.is-loading::after, .loader, .select.is-loading::after {
                        animation: inherit;
                    }
                    .navbar-item.has-dropdown {
                        padding: 0;
                    }
                    .navbar-dropdown {
                        font-size: .875rem;
                        padding-bottom: .5rem;
                        padding-top: .5rem;
                    }
                    .navbar-link, a.navbar-item {
                        cursor: pointer;
                    }
                    @media screen and (min-width: 1024px) {

                        .navbar-item, .navbar-link {
                            align-items: center;
                            display: flex;
                        }
                        .navbar-item {
                            display: flex;
                        }
                        .navbar-item.has-dropdown {
                            align-items: stretch;
                        }
                        .navbar-dropdown.is-right {
                            left: auto;
                            right: 0;
                        }

                        .navbar-dropdown.is-boxed, .navbar.is-spaced .navbar-dropdown {
                            border-radius: 6px;
                            border-top: none;
                            box-shadow: 0 8px 8px rgba(10, 10, 10, .1), 0 0 0 1px rgba(10, 10, 10, .1);
                            display: block;
                            opacity: 0;
                            pointer-events: none;
                            top: calc(100% +(-4px));
                            transform: translateY(-5px);
                            transition-duration: 86ms;
                            transition-property: opacity, transform;
                        }
                        .navbar-dropdown {
                            background-color: #fff;
                            border-bottom-left-radius: 6px;
                            border-bottom-right-radius: 6px;
                            border-top: 2px solid #dbdbdb;
                            box-shadow: 0 8px 8px rgba(10, 10, 10, .1);
                            display: none;
                            font-size: .875rem;
                            left: 0;
                            min-width: 100%;
                            position: absolute;
                            top: 100%;
                            z-index: 20;
                        }
                        .navbar-dropdown a.navbar-item {
                            padding-right: 3rem;
                        }
                        .navbar-dropdown .navbar-item {
                            padding: .375rem 1rem;
                            white-space: nowrap;
                        }
                        .navbar-item.has-dropdown.is-active .navbar-link, .navbar-item.has-dropdown:focus .navbar-link, .navbar-item.has-dropdown:hover .navbar-link {
                            background-color: #fafafa;
                        }
                        .navbar-item.is-active .navbar-dropdown, .navbar-item.is-hoverable:focus .navbar-dropdown, .navbar-item.is-hoverable:focus-within .navbar-dropdown, .navbar-item.is-hoverable:hover .navbar-dropdown {
                            display: block;
                        }
                        .navbar-item.is-active .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:focus .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:focus-within .navbar-dropdown.is-boxed, .navbar-item.is-hoverable:hover .navbar-dropdown.is-boxed, .navbar.is-spaced .navbar-item.is-active .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:focus .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:focus-within .navbar-dropdown, .navbar.is-spaced .navbar-item.is-hoverable:hover .navbar-dropdown {
                            opacity: 1;
                            pointer-events: auto;
                            transform: translateY(0);
                        }
                    }
                </style>
                <div class="btn-wrapper">


                    <div class="navbar-item has-dropdown is-hoverable lang-dropdown">
                        <a class="navbar-link is-arrowless">

                            <?php
                            $lang = session()->has('lang') ? session()->get('lang') : get_default_language();
                            $flag = $lang == 'ar' ? 'sa' : $lang;

                            $setLang = \App\Models\Language::query()->where('slug', '=', $lang)->first();
                            ?>
                            <img
                                style="border-radius: 50%;width: 40px;height: 40px;max-height: 40px;"
                                src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($flag)); ?>.png"
                                srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($flag)); ?>.png 2x"
                                height="40"
                                alt="country flag">
                        </a>


                        <div class="navbar-dropdown is-boxed  <?php echo e($setLang->direction ? '' : 'is-right'); ?>">
                            <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php $slug = $lang->slug == 'ar' ? 'sa' : $lang->slug ?>


                                <a class="navbar-item"
                                   href="<?php echo e(route('tenant.admin.setLocaleAdmin', ['param' => $lang->slug])); ?>">
                                    <img
                                        src="https://flagcdn.com/w40/<?php echo e(get_lang_flag_name($slug)); ?>.png"
                                        srcset="https://flagcdn.com/w80/<?php echo e(get_lang_flag_name($slug)); ?>.png 2x"
                                        height="40"
                                        alt="<?php echo e($lang->name); ?>">
                                    <span><?php echo e($lang->name); ?></span>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item nav-logout d-none d-lg-block">
                <a class="btn btn-outline-danger btn-icon-text"
                   href="<?php echo e(tenant_url_with_protocol(tenant()->domain?->domain)); ?>" target="_blank">
                    <i class="mdi mdi-upload btn-icon-prepend"></i> <?php echo e(__('Visit Your Website')); ?>

                </a>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
        </button>
    </div>
</nav>

<!--  All Warnings Modal -->
<div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('All Stock Warnings')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php
                            $inventory = $product?->inventory?->stock_count;
                            $variant = $product->inventoryDetail->where('stock_count', '<=', $threshold_amount)->first();
                            $variant = !empty($variant) ? $variant->stock_count : [];

                            $stock = min($inventory, $variant);
                        ?>

                        <div class="col-lg-12 col-md-12">
                            <div class="card warning-details-card mb-2">
                                <a class="dropdown-item"
                                   href="<?php echo e(route('tenant.admin.product.edit', $product->id).'/inventory-tab'); ?>">
                                    <div class="preview-thumbnail d-flex">
                                        <div class="preview-icon text-warning">
                                            <i class="mdi mdi-cart-arrow-down"></i>
                                        </div>
                                        <h6 class="preview-subject font-weight-normal mb-1"><?php echo e($product->name); ?></h6>
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <p class="text-gray ellipsis mb-0 text-danger"> <?php echo e(sprintf(__('Remaining stock is %u'), $stock)); ?> </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <h6 class="p-3 mb-0 text-center"><?php echo e(__('No data available')); ?></h6>
                    <?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/crux/public_html/core/resources/views/tenant/admin/partials/topbar.blade.php ENDPATH**/ ?>