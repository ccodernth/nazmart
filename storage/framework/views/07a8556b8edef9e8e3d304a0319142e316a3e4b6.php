<?php $__env->startSection('content'); ?>
    <style>
        .dashboard-list .list.has-children .sub-menu {
            display: none;
        }

        /*.dashboard-list .list.has-children.open .sub-menu {*/
        /*    display: block;*/
        /*}*/
        .dashboard-list .list.has-children a {
            position: relative;
        }

        .dashboard-list .list.has-children > a:after {
            content: "\f067";
            position: absolute;
            right: 20px;
            top: 16px;
            font-family: 'Line Awesome Free';
            font-weight: 900;
        }

        .dashboard-list .list.has-children.show > a:after {
            content: "\f068";
        }

        .dashboard-list .list.has-children .sub-menu {
            padding-left: 20px;
        }

        .dashboard-list .list.has-children .sub-menu li a {
            padding: 7px 15px;
            margin: 0;
        }

        .dashboard-list .list.show > a {
            background: var(--main-color-one);
        }

        .dashboard-list .list.has-children.show > .sub-menu .list.selected a {
            background: #fff;
            color: var(--main-color-one);
            font-size: 16px;
        }

        .dashboard-list .list.has-children .sub-menu li a:hover {
            background: #fff;
            color: var(--main-color-one);
        }

        .dashboard-list .list:hover a {
            background: unset;
            color: unset;
        }

        .dashboard-list .list a:hover {
            background: var(--main-color-one);
            font-weight: 500;
            color: #fff;
        }
    </style>
    <div class="container">
        <div class="body-overlay"></div>
        <div class="dashboard-area landlord dashboard-padding" data-padding-top="100" data-padding-bottom="100">
            <div class="container-fluid">
                <div class="dashboard-contents-wrapper">
                    <div class="dashboard-icon">
                        <div class="sidebar-icon">
                            <i class="las la-bars"></i>
                        </div>
                    </div>
                    <div class="dashboard-left-content">
                        <div class="dashboard-close-main">
                            <div class="close-bars"><i class="las la-times"></i></div>
                            <div class="dashboard-top padding-top-40">
                                <div class="author-content">
                                    <h4 class="title"> <?php echo e(Auth::guard('web')->user()->name ?? __('Not Given')); ?> </h4>
                                </div>
                            </div>
                            <div class="dashboard-bottom margin-top-35 margin-bottom-50">
                                <ul class="dashboard-list">
                                    <li class="list <?php if(request()->routeIs('landlord.user.home')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('landlord.user.home')); ?>"> <i
                                                class="las la-th"></i> <?php echo e(__('Dashboard')); ?> </a>
                                    </li>

                                    <li class="list <?php if(request()->routeIs('landlord.user.dashboard.package.order')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('landlord.user.dashboard.package.order')); ?>"> <i
                                                class="las la-tasks"></i> <?php echo e(__('Payment Logs')); ?> </a>
                                    </li>

                                    <li class="list <?php if(request()->routeIs('landlord.user.dashboard.custom.domain')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('landlord.user.dashboard.custom.domain')); ?>"> <i
                                                class="las la-globe"></i> <?php echo e(__('Custom Domain')); ?> </a>
                                    </li>

                                    <?php if(!empty(get_static_option('user_wallet'))): ?>
                                        <li class="list has-children">
                                            <a href="javascript:void(0)"> <i
                                                    class="las la-wallet"></i> <?php echo e(__('My Wallet')); ?> </a>
                                            <ul class="sub-menu">
                                                <li class="list <?php echo e(request()->routeIs('landlord.user.wallet.history') ? 'selected' : ''); ?>">
                                                    <a class="<?php if(request()->routeIs('landlord.user.wallet.history')): ?> active-submenu <?php endif; ?>"
                                                       href="<?php echo e(route('landlord.user.wallet.history')); ?>"><?php echo e(__('My Wallet')); ?></a>
                                                </li>
                                                <li class="list <?php echo e(request()->routeIs('landlord.user.wallet.settings') ? 'selected' : ''); ?>">
                                                    <a class="<?php if(request()->routeIs('landlord.user.wallet.settings')): ?> active-submenu <?php endif; ?>"
                                                       href="<?php echo e(route('landlord.user.wallet.settings')); ?>"><?php echo e(__('Settings')); ?></a>
                                                </li>
                                            </ul>
                                        </li>
                                    <?php endif; ?>

                                    <li class="list <?php if(request()->routeIs('landlord.user.home.support.tickets')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('landlord.user.home.support.tickets')); ?>"> <i
                                                class="las la-ticket-alt"></i> <?php echo e(__('Support Tickets')); ?> </a>
                                    </li>
                                    <li class="list <?php if(request()->routeIs('landlord.user.home.edit.profile')): ?> active <?php endif; ?>">
                                        <a href="<?php echo e(route('landlord.user.home.edit.profile')); ?>"> <i
                                                class="las la-user"></i> <?php echo e(__('Edit Profile')); ?> </a>
                                    </li>
                                    <li class="list <?php if(request()->routeIs('landlord.user.home.change.password')): ?> active <?php endif; ?> ">
                                        <a href="<?php echo e(route('landlord.user.home.change.password')); ?>"> <i
                                                class="las la-lock"></i> <?php echo e(__('Change Password')); ?> </a>
                                    </li>

                                    <li class="list">
                                        <a href="<?php echo e(route('landlord.user.logout')); ?>"><i
                                                class="las la-sign-out-alt"></i><?php echo e(__('Logout')); ?></a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="dashboard-right">
                        <div class="parent">
                            <div class="col-xl-12">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.error-msg','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('error-msg'); ?>
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
                                <?php echo $__env->yieldContent('section'); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('landlord.frontend.frontend-page-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/resources/views/landlord/frontend/user/dashboard/user-master.blade.php ENDPATH**/ ?>