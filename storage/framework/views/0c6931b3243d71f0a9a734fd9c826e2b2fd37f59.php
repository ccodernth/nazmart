<?php if($errors->any()): ?>
    <div class="alert alert-danger search-results-fields">
        <ul class="list-none">
            <button type="button" class="close btn-sm" data-bs-dismiss="alert">×</button>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>

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
       
    </div>
    
</div>

<div class="cat-right-elements-out ">
    <div class="cat-right-elements">
        <div class="cat-right-elements-left text-black">
           
        </div>
        <div class="shop-right">
            <div class="single-shops">
                <div class="shop-nice-select" id="nice-select" style="display: none;">
                    <select class="text-black">
                        <option value="3"> <?php echo e(__('Sort By Date')); ?> </option>
                        <option value="1"> <?php echo e(__('Sort By Name')); ?> </option>
                        <option value="2"> <?php echo e(__('Sort By Popularity')); ?> </option>
                        <option value="4"> <?php echo e(__('Lowest to Highest')); ?> </option>
                        <option value="5"> <?php echo e(__('Highest to Lowest')); ?> </option>
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



<div class="cat-left-box-out-filterbox-out selectder-filter-contents click-hide-filter" style="display: none">
    <a href="javascript:void(0)" class="button-red" data-tooltip=""
       data-original-title="" title=""> 
        <div class="selected-clear-items">
            <ul class="selected-flex-list" id="_porduct_fitler_item">

            </ul>
        </div>
    </a>
    <a href="javascript:void(0)" class="button-blue click-hide-parent" data-filter="all"> <?php echo e(__('Clear All')); ?> </a>
</div>


<?php /**PATH /home/crux/public_html/core/resources/views/themes/fruit/frontend/shop/partials/filter-partials/shop-filters.blade.php ENDPATH**/ ?>