<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'tag' => 'sup'
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'tag' => 'sup'
]); ?>
<?php foreach (array_filter(([
    'tag' => 'sup'
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<<?php echo e($tag); ?> style="color: red">*</<?php echo e($tag); ?>>
<?php /**PATH /home/crux/public_html/core/resources/views/components/fields/mandatory-indicator.blade.php ENDPATH**/ ?>