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



		<div class="col-md-4">
			<div class="card">
              <div class="card-header">
                <h4 class="card-title">Listado general de Alumnos</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                	<?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	                  <li>
	                  	<div>
	                  	</div>
	                    <div class="row">
	                      <div class="col-md-2 col-2">
	                        <div class="avatar">
	                        	<?php if($alumno->avatar == null): ?>
	                        		<img class="avatar border-gray" src="images/avatar/guest-user.jpg" alt="">
	                        	<?php else: ?>
	                        		<img src="images/avatar/<?php echo e($alumno->avatar); ?>" class="img-circle img-no-padding img-responsive">
	                        	<?php endif; ?>

	                          
	                        </div>
	                      </div>
	                      <div class="col-md-7 col-7">
	                        <?php echo e($alumno->name); ?>

	                        <br />
	                        <span class="text-muted"><small><?php echo e($alumno->classroom); ?></small></span>
	                      </div>
	                      <div class="col-md-3 col-3 text-right">
	                      	<a href="<?php echo e(route('student.show', $alumno->id )); ?>" class="btn btn-sm btn-outline-info btn-round btn-icon">
	                      		<i class="far fa-edit"></i>
	                      	</a>
	                        <!--form class="form-group d-inline" method="POST" action="/user/<?php echo e($alumno->id); ?>" id="form-delete-user">
						      	<?php echo csrf_field(); ?>
								<?php echo method_field('DELETE'); ?>
								<button type="button" class="btn btn-sm btn-outline-danger btn-round btn-icon" data-toggle="modal" data-target="#exampleModalCenter">
									<i class="far fa-trash-alt"></i>
								</button>
						    </form-->
	                        
	                      </div>
	                    </div>
	                  </li>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
              </div>
            </div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/student/index.blade.php ENDPATH**/ ?>