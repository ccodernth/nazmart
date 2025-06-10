<section class="contact-map-area section-bg-1" data-padding-top="<?php echo e($data['padding_top']); ?>" data-padding-bottom="<?php echo e($data['padding_bottom']); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-map-wrapper">
                    <div class="contact-map-wrapper-flex">
                        <div class="contact-map">
                            <?php echo $data['location']; ?>

                        </div>
                        <div class="contact-map-wrapper-contents bg-white">
                            <h2 class="contact-map-wrapper-contents-title title-bottom-border"> <?php echo e($data['title'] ?? __('Send us an Email')); ?> </h2>
                            <?php if(!empty($data['custom_form_id'])): ?>
                                <?php $form_details = \App\Models\FormBuilder::find($data['custom_form_id']); ?>

                                <?php echo \App\Helpers\FormBuilderCustom::render_form(optional($form_details)->id,null,null,'btn-default'); ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php $__env->startSection('scripts'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.custom-js.contact-form-store','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('custom-js.contact-form-store'); ?>
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

<?php /**PATH /home/crux/public_html/core/plugins/PageBuilder/views/landlord/addons/common/contact.blade.php ENDPATH**/ ?>