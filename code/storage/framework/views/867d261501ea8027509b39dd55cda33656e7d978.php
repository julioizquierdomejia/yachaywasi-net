<?php $__env->startSection('content'); ?>
<h1>Tema: <?php echo e($tema->name); ?></h1>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/subject/detail.blade.php ENDPATH**/ ?>