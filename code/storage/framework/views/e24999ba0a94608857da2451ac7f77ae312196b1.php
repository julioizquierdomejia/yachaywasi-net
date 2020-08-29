<?php $__env->startSection('content'); ?>
	
	<a href="<?php echo e(route('course.create')); ?>" class="btn btn-primary btn-round">Crear Cursos</a>

	<h1 class="display-4">Cursos</h1>

		<div class="row row-cols-1 row-cols-md-2 row-cols-lg-4">
			<?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="col mb-4">
					<div class="card" style='height: 340px;'>
						<?php if($curso->images == null): ?>
							<img class="card-img-top" src="images/course-default.png" alt="Card image cap">
						<?php else: ?>
							<img class="card-img-top" src="images/course/<?php echo e($curso->images); ?>" alt="Card image cap">
						<?php endif; ?>
					  <div class="card-body">
					    <h5 class="card-title"><?php echo e($curso->name); ?></h5>
					    <p class="card-text"> <?php echo e($curso->descripcion); ?></p>
					    
					  </div>

					  <div class="card-footer mt">

						<a href=" <?php echo e(route('course.show', $curso->id )); ?>" class="btn btn-primary"><i class="fas fa-search"></i></a>
						<a href="<?php echo e(route('course.edit', $curso->id )); ?>" class="btn btn-success"><i class="far fa-edit"></i></a>

						<form class="form-group d-inline" method="POST" action="/course/<?php echo e($curso->id); ?>" id="form_delete_coutse">
							<?php echo csrf_field(); ?>
							<?php echo method_field('DELETE'); ?>
							<!--
							<button type="submit" class="btn btn-danger d-inline"><i class="far fa-trash-alt"></i></button>
							-->

							<button type="button" class="btn btn-danger d-inline" data-toggle="modal" data-target="#modalDeleteCourse">
                            <i class="far fa-trash-alt"></i>
                          </button>

						</form>

						</div>


					</div>
					
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>

		<!-- Modal confirmacion de eliminacion de Registro-->
	    <div class="modal fade" id="modalDeleteCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	      <div class="modal-dialog modal-dialog-centered" role="document">
	        <div class="modal-content">
	          <div class="modal-header">
	            <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Curso</h5>
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	              <span aria-hidden="true">&times;</span>
	            </button>
	          </div>
	          <div class="modal-body">
	            ¿Está seguro de Eliminar el Curso de <b></b>? <br>
	            al elimiar este curso, también se eliminaran sus <b>Competencias</b>
	          </div>
	          <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">
	              <i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
	            </button>
	            <button type="button" class="btn btn-danger btn-delete-course">
	              <i class="far fa-trash-alt mr-2" style='font-size: 14px;'></i>Eliminar
	            </button>
	          </div>
	        </div>
	      </div>
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

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/course/index.blade.php ENDPATH**/ ?>