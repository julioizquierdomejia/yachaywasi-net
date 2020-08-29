<?php $__env->startSection('content'); ?>
	

	<div class="content">
		<div class="row">
			<div class="col">
				<h2>Asignar Cursos al Docente</h2>
			</div>
		</div>
		<div class="row">
          <div class="col-md-4">
            <div class="card card-user" style='height: 320px;'>
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
            </div>
          </div> 

          <!-- Columna del formulario -->
          <div class="col-md-8">
            <div class="card card-user">
		      <div class="card-header">
		      	<h5 class="card-title">Asignar cursos</h5>
		      </div>
				<!-- Inicio del card_body -->
				<div class="card-body">
					
					<form class="form-group" method="POST" action="/createcourses" enctype="multipart/form-data">
					<?php echo csrf_field(); ?>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="user_id" placeholder="Id del Usuario" class="form-control mb-2" value="<?php echo e($user->id); ?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="level_id" placeholder="Nivel" class="form-control mb-2" id="level_id">
								</div>
							</div>
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="degree_id" placeholder="Grado" class="form-control mb-2" id="degree_id">
								</div>
							</div>
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- Input -->
									<input type="hidden" name="course_id" placeholder="Curso" class="form-control mb-2" id="course_id">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dropdown_nivel">
									    Seleccion Un Nivel
									  </button>
									  <div class="dropdown-menu shadow" id="dropdown_niveles">
									  	<?php $__currentLoopData = $niveles_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <a class="dropdown-item opc_nivel" href="#" id="<?php echo e($nivel->id); ?>"><?php echo e($nivel->name); ?></a>
									    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									  </div>
									</div>
								</div>
							</div>

							<div class="col-md-4 pr-1">
								
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Seleccion Un Grado
									  </button>
									  <div class="dropdown-menu shadow opc-grados">
									  	<?php $__currentLoopData = $grados_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <a class="dropdown-item opc_grado" href="#" id="<?php echo e($grado->id); ?>"><?php echo e($grado->name); ?></a>
									    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									  </div>
									</div>
								
							</div>

							<div class="col-md-4 pr-1">
								<div class="form-group">
									<!-- DropDown -->
									<div class="btn-group">
									  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									    Seleccion Un Curso
									  </button>
									  <div class="dropdown-menu shadow opc-cursos">
										<?php $__currentLoopData = $cursos_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <a class="dropdown-item opc_curso" href="#" id="<?php echo e($curso->id); ?>"><?php echo e($curso->name); ?></a>
									    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									  </div>
									</div>
								</div>
							</div>
						</div>


						<div class="row">
							<div class="update ml-auto mr-auto">
								<button type="submit" class="btn btn-primary"><i class="far fa-edit mr-2" style='font-size: 14px;'></i> Agregar Curso para el usuario --  <?php echo e($user->id); ?></button>
							</div>
						</div>
					</form>
				</div>
				<!-- Fin del card_body -->
		    </div>

          </div>
        </div>
		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					<?php $__currentLoopData = $niveles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nivel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<p><?php echo e($nivel->name); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					<?php $__currentLoopData = $grados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<p><?php echo e($grado->name); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					<?php $__currentLoopData = $cursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<p><?php echo e($curso->name); ?></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="card card-user">
					<?php echo e($usuario); ?>

				</div>
			</div>
		</div>


	</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
	
	<script>
		$(document).ready(function(){
			$('.dropdown-item').click(function(){

				if( $(this).hasClass('opc_nivel') ){
					$('#level_id').val($(this).attr('id'));
				}

				if( $(this).hasClass('opc_grado') ){
					$('#degree_id').val($(this).attr('id'));
				}

				if( $(this).hasClass('opc_curso') ){
					$('#course_id').val($(this).attr('id'));
				}

				nivel = $(this).parent();
				nivel.parent().find($('.dropdown-toggle')).text($(this).text())
				currentId = $(this).attr('id');
				//AJAX

				/*
				$.get( "/api/grados/"+currentId, function( data ) {
				  var html_select;
				  for (var i = 0; i < data.length; i++) {
				  	html_select += '<label class="btn btn-secondary"><input type="radio" name="options" id="option1"> ' + data[i].name + '</label>'
				  	$('.opc-grados').html(html_select);
				  }
				});
				*/

			})
		})

		

	</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/users/addcourse.blade.php ENDPATH**/ ?>