<?php $__env->startSection('content'); ?>

<?php if($errors->any()): ?>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<div class="alert alert-danger">
					<span><i class="fas fa-exclamation-triangle"></i> <?php echo e($error); ?></span>
				</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		<?php endif; ?>

<div class="content">
        <div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../images/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  	<?php if( $userAuth->avatar == null): ?>
                  		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="...">
                  	<?php else: ?>
                    	<img class="avatar border-gray" src="images/avatar/<?php echo e($userAuth->name); ?>" alt="...">
                    <?php endif; ?>
                    <h5 class="title">Colegio - <?php echo e($userAuth->school); ?></h5>
                  </a>
                  <p class="description">
                    <?php echo e($userAuth->name); ?>

                  </p>
                </div>
                <p class="description text-center">
                </p>
              </div>
              <div class="card-footer">
                <hr>
                <div class="button-container">
                  <div class="row">
                    <div class="col-lg-3 col-md-6 col-6 ml-auto">
                      <h5><?php echo e($docentes->count()); ?><br><small>Docentes</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5><?php echo e($cursos->count()); ?><br><small>Cursos</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5>24,6$<br><small>Spent</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Equipo de Docentes</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                	<?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                  <li>
	                  	<div>
	                  	</div>
	                    <div class="row">
	                      <div class="col-md-2 col-2">
	                        <div class="avatar">
	                        	<?php if($docente->avatar == null): ?>
	                        		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="">
	                        	<?php else: ?>
	                        		<img src="images/avatar/<?php echo e($docente->avatar); ?>" class="img-circle img-no-padding img-responsive">
	                        	<?php endif; ?>

	                          
	                        </div>
	                      </div>
	                      <div class="col-md-7 col-7">
	                        Miss - <?php echo e($docente->name); ?>

	                        <br />
	                        <span class="text-muted"><small><?php echo e($docente->classroom); ?></small></span>
	                      </div>
	                      <div class="col-md-3 col-3 text-right">
	                      	<a href="<?php echo e(route('user.show', $docente->user_id )); ?>" class="btn btn-sm btn-outline-info btn-round btn-icon">
	                      		<i class="far fa-edit"></i>
	                      	</a>
	                        <form class="form-group d-inline" method="POST" action="/user/<?php echo e($docente->user_id); ?>" id="form-delete-user">
						      	<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="button" class="btn btn-sm btn-outline-danger btn-round btn-icon" data-toggle="modal" data-target="#exampleModalCenter">
									<i class="far fa-trash-alt"></i>
								</button>
						    </form>
	                        
	                      </div>
	                    </div>
	                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-8">
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
		          	<div class="col-md-4 pr-1">
		              <div class="form-group">
		                <label for="exampleInputEmail1">Contraseña</label>
		                <input type="password" name="password" placeholder="Ingrese contraseña" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="text" name="classroom" placeholder="Aula de su responabilidad" class="form-control mb-2">
		              </div>
		            </div>
		            <div class="col-md-4 pl-1">
		              <div class="form-group">
		                <label>slug</label>
		                <input type="text" name="slug" placeholder="Aula de su responabilidad" class="form-control mb-2">
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
		                <?php if( Auth::user()->roles->first()->name == 'admin'): ?>
							<input type="hidden" name="role_id" class="form-control mb-2" value="editor">
						<?php endif; ?>

						<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
							<input type="hidden" name="role_id" class="form-control mb-2" value="lector">
						<?php endif; ?>
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



					<!-- Inicio CARDS -->
					<!-- Grilla de Niveles / Para asginar Grados -->
					<div class="row row-cols-1 row-cols-md-3">
						<?php $__currentLoopData = $niveles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <div class="col mb-4">
						    <div class="card">
						      <div class="card-body">
						        <h5 class="card-title">Nivel - <?php echo e($nivel->name); ?></h5>
						        <?php $__currentLoopData = $nivel->degrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						        <div class="custom-control custom-checkbox">
								  <input type="checkbox" class="custom-control-input" name="grades[]" value="<?php echo e($nivel->id); ?>_<?php echo e($grado->id); ?>" id="level_<?php echo e($nivel->id); ?>_grade_<?php echo e($grado->id); ?>">
								  <label class="custom-control-label" for="level_<?php echo e($nivel->id); ?>_grade_<?php echo e($grado->id); ?>"><?php echo e($grado->name); ?></label>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						      </div>
						    </div>
						  </div>
						 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>

					<!-- Fin CARDS -->

		          <div class="row">
		            <div class="update ml-auto mr-auto">
		              <button type="submit" class="btn btn-primary"><i class="far fa-save mr-2" style='font-size: 14px;'></i> Guardar</button>
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
          </div>
        </div>
      </div>

      <!-- Modal confirmacion de eliminacion de Registro-->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Eliminar Docente</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        ¿Está seguro de Eliminar el registro?
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">
		        	<i class="fas fa-times-circle mr-2" style='font-size: 14px;'></i>Cerrar
		        </button>
		        <button type="button" class="btn btn-danger btn-delete-user">
		        	<i class="far fa-trash-alt mr-2" style='font-size: 14px;'></i>Eliminar
		        </button>
		      </div>
		    </div>
		  </div>
		</div>

<!-- 
<div class="container mt-5">

	<?php if(session('status')): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
			<?php echo e(session('status')); ?>

			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>

	<h1 class="display-4">Docentes</h1>

	<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
	  	<?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  	<div class="col mb-4">
		  	<div class="card text-center">
			    <img src="images/avatar/<?php echo e($item->avatar); ?>" class="card-img-top rounded-circle mx-auto d-block mt-5 mb-2" alt="<?php echo e($item->name); ?>" style="height: 100px; width: 100px;">
			    <div class="card-body">
			      <h2 class="card-title"><?php echo e($item->name); ?></h2>
			      <a href="<?php echo e(route('user.show', $item->id )); ?>" class="btn btn-primary"><i class="fas fa-search"></i> Ver mas</a>
			      <a href="<?php echo e(route('user.edit', $item->id )); ?>" class="btn btn-success"><i class="far fa-edit"></i> Editar</a>
			      
			      <form class="form-group" method="POST" action="/user/<?php echo e($item->id); ?>">
			      	<?php echo csrf_field(); ?>
					<?php echo method_field('DELETE'); ?>
			      	<button type="submit" class="btn btn-danger d-inline"><i class="far fa-trash-alt"></i> Eliminar</button>
			      </form>

			    </div>
			    <div class="card-footer mt">
			      <small class="text-muted">Colegio Vygotsky - Docente</small>
			    </div>
			  </div>
		  </div>
	    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>


	<a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary">Agregra Usuario</a>
</div>
-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/users/index.blade.php ENDPATH**/ ?>