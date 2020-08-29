<?php $__env->startSection('content'); ?>

<div class="container mt-5">
	<h1 class="display-4">Editar Usuario</h1>	

	<form class="form-group" method="POST" action="/user/<?php echo e($user->id); ?>" enctype="multipart/form-data">
		<?php echo method_field('PUT'); ?>
		<?php echo csrf_field(); ?>
		
		

		<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2" value="<?php echo e($user->name); ?>">
		

		<input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2" value="<?php echo e($user->email); ?>">
		<input type="text" name="slug" placeholder="Ingrese el Slug" class="form-control mb-2" value="<?php echo e($user->slug); ?>">
		<!-- 
		<input type="file" name="avatar">
		-->
		<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Editar</button>
		
	</form>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/users/edit.blade.php ENDPATH**/ ?>