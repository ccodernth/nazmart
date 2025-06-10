<?php if(Auth::guard('web')->check()): ?>
    <div id="reviews" class="tab-content-item">
    <div class="single-details-tab">
        <div class="review-form my-5">
            <h3><?php echo e(__('Leave a Review')); ?></h3>
            <form>
                <input type="hidden" class="rating-count" value="">
                <div class="ratings mt-4">
                    <select class="star-rating">
                        <option value="5"><?php echo e(__('Excellent')); ?></option>
                        <option value="4"><?php echo e(__('Very Good')); ?></option>
                        <option value="3" selected><?php echo e(__('Average')); ?></option>
                        <option value="2"><?php echo e(__('Poor')); ?></option>
                        <option value="1"><?php echo e(__('Terrible')); ?></option>
                    </select>
                </div>

                <div class="form-group mt-4">
                    <textarea rows="8" type="text" name="review_text" class="form-control review-text" id="review-text"></textarea>
                </div>

                <div class="btn-wrapper text-end mt-4">
                    <button type="submit" id="review-submit-btn" class="cmn-btn btn-small cmn-btn-bg-2 radius-0"><?php echo e(__('Submit Review')); ?></button>
                </div>
            </form>
        </div>

        <div class="tab-review">
            <div class="all-reviews">
                <?php $__currentLoopData = $product->reviews->take(5) ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="about-seller-flex-content">
                        <div class="about-seller-thumb">
                            <a href="javascript:void(0)">
                                <?php echo render_image_markup_by_attachment_id($review?->user?->image); ?>

                            </a>
                        </div>
                        <div class="about-seller-content">
                            <h5 class="title fw-500">
                                <a href="javascript:void(0)"> <?php echo e($review?->user?->name); ?> </a>
                            </h5>

                            <?php echo render_star_rating_markup($review->rating); ?>


                            <p class="about-review-para"> <?php echo e($review->review_text); ?> </p>
                            <span class="review-date"> <?php echo e($review->created_at?->diffForHumans()); ?> </span>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="btn-wrapper">
                <a href="javascript:void(0)" class="cmn-btn btn-small cmn-btn-bg-2 radius-0 see-more-review" data-items="5"> <?php echo e(__('See More')); ?> </a>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <div id="reviews" class="tab-content-item">
        <div class="single-details-tab">
            <div class="tab-review">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <?php echo render_image_markup_by_attachment_id('site_logo'); ?>

                            </div>
                            <h4 class="text-capitalize"><?php echo e(__('Hello! let us get started')); ?></h4>
                            <h6 class="font-weight-light"><?php echo e(__('Sign in to continue.')); ?></h6>
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
                            <div id="msg-wrapper"></div>
                            <form class="pt-3" action="" method="post" id="login_form_order_page">
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control form-control-lg" placeholder="<?php echo e(__('Username')); ?>">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg"  placeholder="<?php echo e(__('Password')); ?>">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" id="login_submit_btn"><?php echo e(__('Sign In')); ?></button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" name="remember" class="form-check-input"> <?php echo e(__('Keep me signed in')); ?>

                                            <i class="input-helper"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center mt-4 font-weight-light"> <?php echo e(__('Do not have an account?')); ?> <a href="<?php echo e(route('tenant.user.register')); ?>" class="text-primary"><?php echo e(__('Create')); ?></a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/resources/views/themes/furnito/frontend/shop/product_details/partials/product-reviews.blade.php ENDPATH**/ ?>