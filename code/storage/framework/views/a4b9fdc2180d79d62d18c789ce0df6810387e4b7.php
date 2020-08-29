<?php $__env->startSection('content'); ?>

	<a href="<?php echo e(route('course.create')); ?>" class="btn btn-primary">Crear Área</a>

	<h1 class="display-4">Cursos</h1>

		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
			<?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col mb-4">
					<div class="card" style="width: 18rem;">
					  <img class="card-img-top" src="images/course/<?php echo e($curso->images); ?>" alt="Card image cap">
					  <div class="card-body">
					    <h5 class="card-title"><?php echo e($curso->name); ?></h5>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					    <a href="#" class="btn btn-primary">Go somewhere</a>
					  </div>
					</div>
					<!--
					<div class="card text-center">
						<div class="card-body bg-secondary text-white align-middle">
							<h4 class="card-title"><?php echo e($curso->name); ?></h4>
						</div>
						<div class="card-footer mt">

						<a href="" class="btn btn-primary"><i class="fas fa-search"></i></a>
						<a href="" class="btn btn-success"><i class="far fa-edit"></i></a>

						<form class="form-group d-inline" method="POST" action="/course/<?php echo e($curso->id); ?>">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<button type="submit" class="btn btn-danger d-inline"><i class="far fa-trash-alt"></i></button>
						</form>

						<small class="text-muted">Colegio Vygotsky - Docente</small>
						</div>
					</div>
					-->
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

<?php $__env->stopSection(); ?>

<!--
	<?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="mb-4">

			<h2 class=""><?php echo e($curso->name); ?></h2>

		<?php $__currentLoopData = $curso->competencie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $competencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<p><?php echo e($competencia->name); ?></p>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	-->

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/course/index.blade.php ENDPATH**/ ?>