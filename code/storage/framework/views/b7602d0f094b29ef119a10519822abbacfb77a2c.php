<?php $__env->startSection('content'); ?>

	<div class="container">

		<img src="../images/avatar/<?php echo e($user->avatar); ?>" class="card-img-top mb-4 rounded-circle mx-auto d-block" alt="..." style="height: 100px; width: 100px;">

		<div class="text-center">
			<h3><i class="fas fa-address-book"></i> Nombre : <?php echo e($user->name); ?></h3>
			<h4><i class="far fa-paper-plane"></i> Correo : <?php echo e($user->email); ?></h4>
			<a href="<?php echo e(route('user.edit', $user->id )); ?>" class="btn btn-primary mt-5"><i class="fas fa-user-edit"></i>Editar</a>
			<a href=" <?php echo e(route('user.index')); ?> " class="btn btn-info mt-5"><i class="fas fa-list mr-1"></i> Volver a la lista</a>	
		</div>
		

		
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/users/show.blade.php ENDPATH**/ ?>