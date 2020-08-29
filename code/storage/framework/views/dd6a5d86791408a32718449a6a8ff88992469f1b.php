<?php $__env->startSection('content'); ?>

<div class="content">
	<div class="row">
		
		<div class="col-md-8">
			<div class="card card-user">
		      <div class="card-header">
		      	<h5 class="card-title">Registrar Alumno</h5>
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
		          <div class="row">
		            <div class="col-md-12 pr-1">
		              <div class="form-group">
		                <label>Nombre del alumno</label>
						<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2" value="<?php echo e($alumno->name); ?>">
		              </div>

		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-4 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		                <input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="text" name="classroom" placeholder="Aula de su responabilidad" class="form-control mb-2" value="<?php echo e($alumno->classroom); ?>">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>slug</label>
		                <input type="text" name="slug" placeholder="Aula de su responabilidad" class="form-control mb-2" value="<?php echo e($alumno->slug); ?>">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <!--<label>Asociado al colegio de <?php echo e(Auth::user()->name); ?></label>-->
		                <input type="hidden" name="parent_id" class="form-control mb-2" value="<?php echo e(Auth::user()->id); ?>">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <!--<label>Asociado al rol de  <?php echo e(Auth::user()->name); ?></label>-->
		                <!-- condicional para crear usuario -->
		                <input type="hidden" name="role_id" class="form-control mb-2" value="lector">
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		                
		              	<div class="custom-file custom-file-browser">
						  <input name='avatar' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
						</div>

		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" style='font-size: 14px;'></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		        <?php if($courses->count()): ?>
                <h5>Cursos</h5>
                <ul>
                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($curso->course_name); ?></li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              	</ul>
              	<?php endif; ?>
              	Grado: <?php echo e($degree); ?> de <?php echo e($level); ?>

		      </div>
		    </div>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/student/show.blade.php ENDPATH**/ ?>