<!-- Start datatable js -->
<script src="<?php echo e(global_asset('assets/common/js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(global_asset('assets/common/js/responsive.bootstrap.min.js')); ?>"></script>
<script>
    (function($){
        "use strict";
        $(document).ready(function() {
            $('.table-wrap > table').DataTable( {
                "order": [[0, "desc" ]],
                'columnDefs' : [{
                    'targets' : 'no-sort',
                    "orderable" : false
                }],

                'language': translatedDataTable()
            });
        });
    })(jQuery)
</script>
<?php /**PATH /home/crux/public_html/core/resources/views/components/datatable/js.blade.php ENDPATH**/ ?>