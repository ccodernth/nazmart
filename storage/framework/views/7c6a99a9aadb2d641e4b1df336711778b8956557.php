<script>
    (function ($) {
        "use strict"
        $(document).ready(function () {
            $(document).on('click', '.add_variant_info_btn', function () {
                $(this).closest('.variant_info').append(`<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.repeater','data' => ['isFirst' => false,'colors' => $colors,'sizes' => $sizes,'allAvailableAttributes' => $allAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['is-first' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(false),'colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes),'all-available-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allAttributes)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>`);
            });

            $(document).on('click', '.remove_this_variant_info_btn', function () {
                $(this).closest('.variant_info_repeater').remove();
            });
        });
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
                attribute_repeater += '<div class="row align-items-center">';
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
                attribute_repeater += '<button class="btn btn-danger remove_details_attribute"> x </button>';
                attribute_repeater += '</div>';
                attribute_repeater += '</div>';

                container.find('.item_selected_attributes').append(attribute_repeater);

                attribute_name_field.val('');
                attribute_value_field.val('');
            } else {
                toastr.warning('<?php echo e(__("Select both attribute name and value")); ?>');
            }
        });

        $(document).on('change', '.item_attribute_name', function () {
            let terms = $(this).find('option:selected').data('terms');
            let terms_html = '<option value=""><?php echo e(__("Select attribute value")); ?></option>';

            terms.map(function (term) {
                terms_html += '<option value="' + term + '">' + term + '</option>';
            });

            $(this).closest('.inventory_item').find('.item_attribute_value').html(terms_html);
        });

        let inventory_item_id = 0;

        $(document).on('click', '.repeater_button .add', function (e) {
            let inventory_item = `<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'product::components.variant-info.repeater','data' => ['colors' => $colors,'sizes' => $sizes,'allAvailableAttributes' => $allAttributes]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product::variant-info.repeater'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['colors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($colors),'sizes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($sizes),'all-available-attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($allAttributes)]); ?>
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

            // $('select').select2();
        });

        $(document).on('click', '.remove_details_attribute', function (e) {
            e.preventDefault();

            $(this).parent().parent().remove();
        })

        $(document).on('click', '.repeater_button .remove', function (e) {
            if($('.repeater_button .remove').length > 1){
                $(this).closest('.inventory_item').remove();
            }
        });
    })(jQuery);
</script>
<?php /**PATH /home/crux/public_html/core/Modules/Product/Resources/views/components/variant-info/js.blade.php ENDPATH**/ ?>