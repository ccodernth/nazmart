<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
    'user' => 'landlord',
    'selector' => '',
    'table' => null,
    'column' => 'slug',
    'beforeMsg' => true,
    'disableBtn' => false,
    'disableBtnSelector' => ''
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
    'user' => 'landlord',
    'selector' => '',
    'table' => null,
    'column' => 'slug',
    'beforeMsg' => true,
    'disableBtn' => false,
    'disableBtnSelector' => ''
]); ?>
<?php foreach (array_filter(([
    'user' => 'landlord',
    'selector' => '',
    'table' => null,
    'column' => 'slug',
    'beforeMsg' => true,
    'disableBtn' => false,
    'disableBtnSelector' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>

<?php
    $userType = $user ?? 'tenant';
?>

<script>
    $(document).ready(() => {
        let timer = null;
        const beforeMsg = `<?php echo e($beforeMsg); ?>`;
        const selector = `<?php echo e($selector); ?>`;
        const disableBtn = `<?php echo e($disableBtn); ?>`;
        const disableBtnSelector = `<?php echo e($disableBtnSelector); ?>`;

        $(document).on('keyup', selector, function () {
            let value = $(this).val();

            if(value.length === 0)
            {
                $('.unique-response-text').remove();
                return "";
            }
            beforeValidator();

            clearTimeout(timer);

            timer = setTimeout(() => {
                sendRequest(value);
            }, 800);
        })

        function sendRequest(value)
        {
            const table = `<?php echo e($table); ?>`;
            const column = `<?php echo e($column); ?>`;

            $.ajax({
                type: 'POST',
                url: `<?php echo e(route("{$userType}.unique-checker")); ?>`,
                headers: {
                    'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>",
                },
                data: {
                    table: table,
                    column: column,
                    value: value
                },
                success: function (response){
                    $('.unique-response-text').remove();
                    $(selector).after(searchMarkup(response.type, response.msg));

                    if (disableBtn && response.type === 'success')
                    {
                        $(disableBtnSelector).attr('disabled', false);
                    }
                },
                error: function (response){

                }
            });
        }

        let searchMarkup = (type, msg) => {
            return `<p class="unique-response-text text-${type}">${msg}</p>`;
        }

        let beforeValidator = () => {
            if(beforeMsg)
            {
                $('.unique-response-text').remove();
                $(selector).after(searchMarkup('info', `Checking if the <?php echo e($column); ?> is unique..`));
            }

            if (disableBtn)
            {
                $(disableBtnSelector).attr('disabled', true);
            }
        }
    });
</script>
<?php /**PATH /home/crux/public_html/core/resources/views/components/unique-checker.blade.php ENDPATH**/ ?>