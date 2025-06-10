<?php
    $language = explode('_', get_default_language());
    $language = current($language);
?>

<?php if($language != 'en'): ?>
    <script src="//npmcdn.com/flatpickr/dist/l10n/<?php echo e($language ?? 'en'); ?>.js"></script>
    <script>
        flatpickr.localize(flatpickr.l10ns.<?php echo e($language); ?>);
    </script>
<?php endif; ?>
<?php /**PATH /home/crux/public_html/core/resources/views/components/flatpicker/flatpickr-locale.blade.php ENDPATH**/ ?>