<?php $__env->startSection('content'); ?>

	<div class="container">
		
		<div class="col-md-12">
		    <div class="card card-user">
		      <div class="card-header">
				<h5 class="card-title">Crear Curso</h5>
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/course" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
		          <div class="row">
		            <div class="col-md-8 pr-1">
		              <div class="form-group">
		                <label>nombre de Área</label>
							<input type="text" name="name" placeholder="Nombre del Curso" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>Abreviatura</label>
		                <input type="text" name="abreviatura" placeholder="Ingresa abreviatura" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-12">
		              <div class="form-group">
		                <label >Descripción</label>
		                <input type="text" name="descripcion" placeholder="" class="form-control mb-2">
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12">
		              <div class="form-group">
		                
		              	<div class="custom-file">
						  <input name='images' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
						  <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
						</div>

		              </div>
		            </div>
		          </div>
		          
		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary" style="font-size: 14px;"><i class="far fa-save mr-2" style="font-size: 18px;"></i> Crear Área</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

	<?php if($errors->any()): ?>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="alert alert-danger">
				<span><i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?></span>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/course/create.blade.php ENDPATH**/ ?>