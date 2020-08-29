<?php $__env->startSection('content'); ?>

	<div class="content">
		<div class="row">
			<div class="col">
				<h2>Información del Docente</h2>
			</div>
		</div>
		<div class="row">
          <div class="col-md-4">
            <div class="card card-user">
              <div class="image">
                <img src="../images/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  	<?php if( $user->avatar == null): ?>
                  		<img class="avatar border-gray" src="../images/avatar/guest-user.jpg" alt="...">
                  	<?php else: ?>
                    	<img class="avatar border-gray" src="../images/avatar/<?php echo e($user->avatar); ?>" alt="...">
                    <?php endif; ?>
                    <h5 class="title">Miss <?php echo e($user->name); ?></h5>
                  </a>
                  <p class="description">
                    <b><i class="fas fa-phone-alt mr-2"></i> <?php echo e($user->phone); ?></b>
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
                      <h5>19<br><small>Alumnos</small></h5>
                    </div>
                    <div class="col-lg-4 col-md-6 col-6 ml-auto mr-auto">
                      <h5><?php echo e($levelDegrees->count()); ?><br><small>Grados</small></h5>
                    </div>
                    <div class="col-lg-3 mr-auto">
                      <h5><?php echo e($cursos->count()); ?><br><small>Cursos</small></h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
          <div class="col-md-8">
            <div class="card card-user">
		      <div class="card-header">
		      	<?php if( Auth::user()->roles->first()->name == 'admin'): ?>
					<h5 class="card-title">Actualizar Datos del docente</h5>
				<?php endif; ?>

				<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
					<h5 class="card-title">Registrar Alumno</h5>
				<?php endif; ?>
				
		      </div>

		      <div class="card-body">
		        <form class="form-group" method="POST" action="/user/<?php echo e($user->id); ?>" enctype="multipart/form-data">
		        	<?php echo method_field('PUT'); ?>
					<?php echo csrf_field(); ?>
		          <div class="row">
		            <div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Nombre del Docente</label>
						<input type="text" name="name" placeholder="Nombre del usuario" class="form-control mb-2"value='<?php echo e($user->name); ?>'>
		              </div>
		            </div>
		            <div class="col-md-6 pl-1">
		              <div class="form-group">
		                <label>Telefono</label>
		                <input type="text" name="phone" placeholder="Telefono Celular" class="form-control mb-2" value="<?php echo e($user->phone); ?>">
		              </div>
		            </div>
		            
		          </div>
		          <div class="row">
		          	<div class="col-md-6 pr-1">
		              <div class="form-group">
		                <label>Aula</label>
		                <input type="classroom" name="classroom" placeholder="Aula a cargo" class="form-control mb-2"value='<?php echo e($user->classroom); ?>'>
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
						<?php $__currentLoopData = $levelDegrees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $levelDegree): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col mb-4">
								<div class="card">
									<div class="card-body">
									<h5 class="card-title">Nivel <?php echo e($levelDegree->level->name); ?> - <?php echo e($levelDegree->degree->name); ?></h5>
									<?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <div class="custom-control custom-checkbox">
										  	<input type="checkbox" class="custom-control-input" name="courses[]" value="<?php echo e($levelDegree->id); ?>_<?php echo e($curso->id); ?>" id="<?php echo e($levelDegree->id); ?>_course_<?php echo e($curso->id); ?>" <?php echo e($curso->verifyCourseInLevelDegree($user->id,$levelDegree->level_id,$levelDegree->degree_id) ? 'checked' :''); ?>>
										  	<label class="custom-control-label" for="<?php echo e($levelDegree->id); ?>_course_<?php echo e($curso->id); ?>"><?php echo e($curso->name); ?></label>
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
		              <button type="submit" class="btn btn-primary"><i class="far fa-edit mr-2" style='font-size: 14px;'></i> Actualizar Datos del docente</button>
						<!--a class='btn btn-primary' href="<?php echo e(url('/createcourses/'.$user->id)); ?>"> <i class="far fa-edit mr-2" style='font-size: 14px;'></i> Agregar Cursos - <?php echo e($user->id); ?></a-->
		            </div>
		          </div>
		        </form>
		      </div>
		    </div>
          </div>
        </div>
		

		
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/users/show.blade.php ENDPATH**/ ?>