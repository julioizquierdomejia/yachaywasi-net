<?php $__env->startSection('content'); ?>

<div class="container mt-5">
		<h1 class="display-4">Crear Usuario</h1>	

		<form action="" method="POST">
			<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
			<input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
			<input type="password" name="pasword" placeholder="Ingrese contraseña" class="form-control mb-2">
		</form>

		<a href=" <?php echo e(route('user.index')); ?> " class="btn btn-primary"><i class="far fa-save"></i> Guardar</a>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/users/new.blade.php ENDPATH**/ ?>