<?php $__env->startSection('title'); ?>
    <?php echo e(__('Sales Dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.css'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.bulk-action.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('bulk-action.css'); ?>
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
    <style>
        .box {
            padding: 20px 10px;
            padding-left: 25px;
        }

        .box_wrapper:nth-child(1) .box {
            color: #FC4F00;
            background: rgba(252, 79, 0, 0.1);
        }

        .box_wrapper:nth-child(2) .box {
            color: #0079FF;
            background: rgba(0, 121, 255, 0.1);
        }

        .box_wrapper:nth-child(3) .box {
            color: #22A699;
            background: rgba(34, 166, 153, 0.1);
        }

        .box_wrapper:nth-child(4) .box {
            color: #8F43EE;
            background: rgba(143, 67, 238, 0.1);
        }
        .product-type-item-para {
            font-size: 11px;
            font-weight: 400;
            position: relative;
        }

    </style>

    <div class="col-lg-12 col-ml-12">
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="margin-top-40">
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
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 box_wrapper">
                                <div class="box">
                                    <p><?php echo e(__('Number of Sales')); ?></p>
                                    <h2><?php echo e($total_report['total_sale']); ?></h2>
                                </div>
                            </div>

                            <div class="col-lg-3 box_wrapper">
                                <div class="box">
                                    <p><?php echo e(__('Total Revenue')); ?></p>
                                    <h2><?php echo e(amount_with_currency_symbol($total_report['total_revenue'])); ?></h2>
                                </div>
                            </div>

                            <div class="col-lg-3 box_wrapper">
                                <div class="box">
                                    <p><?php echo e(__('Total Profit')); ?></p>
                                    <h2><?php echo e(amount_with_currency_symbol($total_report['total_profit'])); ?></h2>
                                </div>
                            </div>
                            <div class="col-lg-3 box_wrapper">
                                <div class="box">
                                    <p><?php echo e(__('Total Cost')); ?></p>
                                    <h2><?php echo e(amount_with_currency_symbol($total_report['total_cost'])); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 my-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2" id="chart-daily"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2" id="chart-weekly"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2" id="chart-monthly"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="my-2" id="chart-yearly"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sales_table_wrapper">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th><?php echo e(__('ID')); ?></th>
                                            <th><?php echo e(__('Date')); ?></th>
                                            <th><?php echo e(__('Type')); ?></th>
                                            <th><?php echo e(__('Product')); ?></th>
                                            <th><?php echo e(__('Qty')); ?></th>
                                            <th><?php echo e(__('Cost')); ?></th>
                                            <th><?php echo e(__('Price')); ?></th>
                                            <th><?php echo e(__('Profit')); ?></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $products['items'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <?php $__currentLoopData = $product ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td><?php echo e($item['product_id']); ?></td>
                                                    <td><?php echo e($item['sale_date']->format('m/d/Y')); ?></td>
                                                    <td class="text-capitalize"><?php echo e(\App\Enums\ProductTypeEnum::getText($item['product_type'])); ?></td>
                                                    <td>
                                                        <div class="product-type">
                                                            <h6 class="product-type-title"><?php echo e($item['name']); ?></h6>
                                                            <?php if(!empty($item['variant'])): ?>
                                                                <div class="product-type-inner mt-2">
                                                                    <div class="product-type-item">
                                                                        <span class="product-type-item-para"><?php echo e($item['variant']['color']); ?></span>
                                                                        <span class="product-type-item-para"><?php echo e($item['variant']['size']); ?></span>
                                                                    </div>

                                                                    <?php $__currentLoopData = $item['variant']['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute_name => $attribute_vale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="product-type-item mt-1">
                                                                            <span class="product-type-item-para"><?php echo e($attribute_name); ?>: <?php echo e($attribute_vale); ?></span>
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>

                                                    </td>
                                                    <td><?php echo e($item['qty']); ?></td>
                                                    <td><?php echo e(amount_with_currency_symbol($item['cost'])); ?></td>
                                                    <td><?php echo e(amount_with_currency_symbol($item['price'])); ?></td>
                                                    <td><?php echo e(amount_with_currency_symbol($item['profit'])); ?></td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td class="text-center" colspan="8"><?php echo e(__('No Data Available')); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="pagination mt-4">
                            <ul class="pagination-list">
                                <?php $__currentLoopData = $products["links"]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($loop->iteration == 1):  continue; endif ?>
                                    <li><a href="<?php echo e($link); ?>"
                                           class="page-number <?php echo e(($loop->iteration - 1) == $products["current_page"] ? "current" : ""); ?>"><?php echo e($loop->iteration - 1); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(global_asset('assets/landlord/admin/js/apexcharts.js')); ?>"></script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.datatable.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('datatable.js'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table.btn.swal.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table.btn.swal.js'); ?>
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

    <?php
        $today = $today_report;
        $weekly = $weekly_report;
        $monthly = $monthly_report;
        $yearly = $yearly_report;
    ?>

    <script>
        $(document).ready(function () {
            const chartByToday = () => {
                return {
                    series: [
                        {
                            name: '<?php echo e(__('Total Sale')); ?>',
                            data: <?php echo e(json_encode($today['salesData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Revenue')); ?>',
                            data: <?php echo e(json_encode($today['revenueData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Cost')); ?>',
                            data: <?php echo e(json_encode($today['costData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Profit')); ?>',
                            data: <?php echo e(json_encode($today['profitData'])); ?>

                        },
                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    colors: ['#ff5252', '#0079FF', '#8F43EE', '#22A699'],
                    dataLabels: {
                        enabled: true,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '<?php echo e(__('Today Revenue, Cost and Profit')); ?>',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: <?php echo json_encode($today['categories']) ?>,
                        title: {
                            text: '<?php echo e(__('Time')); ?>'
                        }
                    },
                    yaxis: {
                        title: {
                            text: '<?php echo e(__('Amount')); ?>'
                        },
                        min: 0,
                        max: <?php echo e($today['max_value']); ?>

                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };
            }
            const chartByWeekly = () => {
                return {
                    series: [
                        {
                            name: '<?php echo e(__('Total Sale')); ?>',
                            data: <?php echo e(json_encode($weekly['salesData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Revenue')); ?>',
                            data: <?php echo e(json_encode($weekly['revenueData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Cost')); ?>',
                            data: <?php echo e(json_encode($weekly['costData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Profit')); ?>',
                            data: <?php echo e(json_encode($weekly['profitData'])); ?>

                        },
                    ],
                    chart: {
                        height: 350,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    colors: ['#ff5252', '#0079FF', '#8F43EE', '#22A699'],
                    dataLabels: {
                        enabled: true,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '<?php echo e(__('Current Week Revenue, Cost and Profit')); ?>',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: <?php echo json_encode($weekly['categories']) ?>,
                        title: {
                            text: '<?php echo e(__('Days')); ?>'
                        }
                    },
                    yaxis: {
                        title: {
                            text: '<?php echo e(__('Amount')); ?>'
                        },
                        min: 0,
                        max: <?php echo e($weekly['max_value']); ?>

                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };
            }
            const chartByMonth = () => {
                return {
                    series: [
                        {
                            name: '<?php echo e(__('Total Revenue')); ?>',
                            data: <?php echo e(json_encode($monthly['revenueData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Cost')); ?>',
                            data: <?php echo e(json_encode($monthly['costData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Profit')); ?>',
                            data: <?php echo e(json_encode($monthly['profitData'])); ?>

                        },
                    ],
                    chart: {
                        height: 500,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    colors: ['#0079FF', '#8F43EE', '#22A699'],
                    dataLabels: {
                        enabled: true,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '<?php echo e(__('Monthly Revenue, Cost and Profit')); ?>',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: <?php echo json_encode($monthly['categories']) ?>,
                        title: {
                            text: '<?php echo e(__('Month')); ?>'
                        }
                    },
                    yaxis: {
                        title: {
                            text: '<?php echo e(__('Amount')); ?>'
                        },
                        min: 0,
                        max: <?php echo e($monthly['max_value']); ?>

                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };
            }
            const chartByYear = () => {
                return {
                    series: [
                        {
                            name: '<?php echo e(__('Total Revenue')); ?>',
                            data: <?php echo e(json_encode($yearly['revenueData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Cost')); ?>',
                            data: <?php echo e(json_encode($yearly['costData'])); ?>

                        },
                        {
                            name: '<?php echo e(__('Total Profit')); ?>',
                            data: <?php echo e(json_encode($yearly['profitData'])); ?>

                        },
                    ],
                    chart: {
                        height: 500,
                        type: 'line',
                        toolbar: {
                            show: false
                        },
                        zoom: {
                            enabled: false
                        }
                    },
                    colors: ['#0079FF', '#8F43EE', '#22A699'],
                    dataLabels: {
                        enabled: true,
                    },
                    stroke: {
                        curve: 'smooth'
                    },
                    title: {
                        text: '<?php echo e(__('Yearly Revenue, Cost and Profit')); ?>',
                        align: 'left'
                    },
                    grid: {
                        borderColor: '#e7e7e7',
                        row: {
                            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
                            opacity: 0.5
                        },
                    },
                    markers: {
                        size: 1
                    },
                    xaxis: {
                        categories: <?php echo json_encode($yearly['categories']) ?>,
                        title: {
                            text: '<?php echo e(__('Year')); ?>'
                        }
                    },
                    yaxis: {
                        title: {
                            text: '<?php echo e(__('Amount')); ?>'
                        },
                        min: 0,
                        max: <?php echo e($yearly['max_value']); ?>

                    },
                    legend: {
                        position: 'top',
                        horizontalAlign: 'right',
                        floating: true,
                        offsetY: -25,
                        offsetX: -5
                    }
                };
            }

            new ApexCharts(document.querySelector("#chart-daily"), chartByToday()).render();
            new ApexCharts(document.querySelector("#chart-weekly"), chartByWeekly()).render();
            new ApexCharts(document.querySelector("#chart-monthly"), chartByMonth()).render();
            new ApexCharts(document.querySelector("#chart-yearly"), chartByYear()).render();
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('tenant.admin.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/crux/public_html/core/Modules/SalesReport/Resources/views/tenant/admin/index.blade.php ENDPATH**/ ?>