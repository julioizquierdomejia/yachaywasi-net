<?php $__env->startSection('content'); ?>

	<div class="container">
		<?php echo e(Auth::user()->roles()->first()->name); ?>


		<div class="col-md-12">
		    <div class="card card-user">
		      <div class="card-header">
		      	<?php if( Auth::user()->roles->first()->name == 'admin'): ?>
					<h5 class="card-title">Registrar Docente</h5>
				<?php endif; ?>

				<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
					<h5 class="card-title">Registrar Alumno</h5>
				<?php endif; ?>
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Nombre del Docente</label>
							<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Username</label>
		                <input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		          	<div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		                <input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Slug</label>
		                <input type="text" name="slug" placeholder="Escribir un slug" class="form-control mb-2">
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Asociado a <?php echo e(Auth::user()->name); ?></label>
		                <input type="number" name="parent_id" class="form-control mb-2" value="<?php echo e(Auth::user()->id); ?>">
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Asociado a <?php echo e(Auth::user()->name); ?></label>
		                <?php if( Auth::user()->roles->first()->name == 'admin'): ?>
							<input type="text" name="elRol" class="form-control mb-2" value="editor">
						<?php endif; ?>

						<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
							<input type="text" name="elRol" class="form-control mb-2" value="lector">
						<?php endif; ?>
		              </div>
		            </div>
		          </div>

		          <div class="row">
		            <div class="col-md-12 pr-1 pl-1">
		              <div class="form-group">
		                <label>Adjunto foto de perfil</label>
		                <input type="file" name="avatar"> 
		              </div>
		            </div>
		          </div>
		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
		  </div>
		</div>

<!--
	<div class="container mt-5">
	

	

	<form class="form-group" method="POST" action="/user" enctype="multipart/form-data">
		<?php echo csrf_field(); ?>
		<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2">
		<input type="email" name="email" placeholder="Ingrese el Email" class="form-control mb-2">
		<input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		<input type="text" name="slug" placeholder="Escribir un slug" class="form-control mb-2">
		<input type="text" name="parent_id" class="form-control mb-2" value="<?php echo e(Auth::user()->id); ?>">
		<?php if( Auth::user()->roles->first()->name == 'admin'): ?>
			<input type="text" name="elRol" class="form-control mb-2" value="editor">
		<?php endif; ?>

		<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
			<input type="text" name="elRol" class="form-control mb-2" value="lector">
		<?php endif; ?>
		
		 <input type="file" name="avatar"> 
		<button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Guardar</button>
	</form>
	
-->
	<?php if($errors->any()): ?>
		<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div class="alert alert-danger">
				<span><i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?></span>
			</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>
	</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/users/create.blade.php ENDPATH**/ ?>