<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'selector' => '#telephone',
    'submitButtonId' => 'register_button',
    'key' => 1
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'selector' => '#telephone',
    'submitButtonId' => 'register_button',
    'key' => 1
]); ?>
<?php foreach (array_filter(([
    'selector' => '#telephone',
    'submitButtonId' => 'register_button',
    'key' => 1
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<link rel="stylesheet" href="<?php echo e(global_asset('assets/common/css/intlTelInput.min.css')); ?>">
<style>
    #telephone.error{
        border-color: var(--main-color-one);
    }
    #telephone.success{
        border-color: var(--main-color-three);
    }
    .single-input .iti {
        width: 100%;
    }
</style>

<script src="<?php echo e(global_asset('assets/common/js/intlTelInput.js')); ?>"></script>
<script>
    eval('let input' + `<?php echo e($key); ?>` + '= undefined;');
    eval('let iti' + `<?php echo e($key); ?>` + '= undefined;');

    let input<?php echo e($key); ?> = document.querySelector(`<?php echo e($selector); ?>`);

    let iti<?php echo e($key); ?> = window.intlTelInput(input<?php echo e($key); ?>, {
        autoPlaceholder: "off",
        // formatOnDisplay: false,
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        excludeCountries: ["il"],
        separateDialCode: true,
        utilsScript: `<?php echo e(global_asset("assets/common/js/utils.js")); ?>`
    });

    // TODO:: When user select a country and input another country phone number then again select the correct country then auto validate the full number
    $(document).on('keyup', `<?php echo e($selector); ?>`, function () {
        let el = $(this);
        let inputNumbers = el.val();

        let phoneNumbers = inputNumbers.replace(/[^0-9+]/g, '');
        el.val(phoneNumbers);

        $('.error-text').remove();

        let isValid = iti<?php echo e($key); ?>.isValidNumber();
        if (!isValid) {
            el.addClass('error');
            el.parent().after(`<p class="text-end text-danger error-text"><small><?php echo e(__('The number is not valid.')); ?></small></p>`);
            document.getElementById(`<?php echo e($submitButtonId); ?>`).disabled = true;
        } else {
            el.val(iti<?php echo e($key); ?>.getNumber());

            el.removeClass('error');
            el.addClass('success');
            el.parent().after(`<p class="text-end text-success error-text"><small><?php echo e(__('The number is perfect.')); ?></small></p>`);
            setTimeout(function () {
                el.removeClass('success');
                $('.error-text').remove();
            }, 5000);
            document.getElementById(`<?php echo e($submitButtonId); ?>`).disabled = false;
        }
    });
</script>
<?php /**PATH /home/crux/public_html/core/resources/views/components/custom-js/phone-number-config.blade.php ENDPATH**/ ?>