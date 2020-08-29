<?php $__env->startSection('content'); ?>
	<div class="col-12">
		<p>Nivel <?php echo e($course->degree_level->level->name); ?> - <?php echo e($course->degree_level->degree->name); ?></p>
	    <h2 class="display-4"><?php echo e($course->course->name); ?></h2>

		<div class="content">
		<div class="row">
			<div class="col-md-12">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Agregar Temas</h5>
              </div>
              <div class="card-body">
                <form method="post" action="<?php echo e(route('subject.store')); ?>" enctype="multipart/form-data">
                  <?php echo csrf_field(); ?>
                  <input type="hidden" name="level_course_id" value="<?php echo e($course->id); ?>">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Nombre del Tema</label>
                        <input type="text" class="form-control" placeholder=""  name="name" value="">
                      </div>
                    </div>

                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>Bimestre</label>
                        <input type="text" class="form-control" name="bimester" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-2 px-1">
                      <div class="form-group">
                        <label>Unidad</label>
                        <input type="text" class="form-control"  name="unit" placeholder="" value="">
                      </div>
                    </div>
                    <div class="col-md-2 pl-1">
                      <div class="form-group">
                        <label>Número de Tema</label>
                        <input type="text" class="form-control"  name="position"  placeholder="" value="">
                      </div>
                    </div>
                  </div>
                  
                  <div class="row">
    		            <div class="col-md-6">
    		              <div class="form-group">
    		              	<div class="custom-file custom-file-browser">
            						  <input name='file_drive' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
            						  <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
            						</div>
    		              </div>
    		            </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <div class="custom-file custom-file-browser">
                        <input name='file_drive_second' type="file" class="custom-file-input form-control" id="customFileLang" lang="es">
                        <label class="custom-file-label label-file" for="customFileLang">Seleccionar Archivo</label>
                      </div>
                    </div>
                  </div>
		            </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>URL Video Youtube</label>
                        <input type="text" class="form-control" placeholder="" name="link_youtube" value="">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Fecha</label>
                        <input type="date" class="form-control" placeholder="" name="date" value="Aqui un date Picker">
                      </div>
                    </div>
                  </div>

                  
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Crear Tema</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
		</div>


		<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Lista de Temas</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Numero del tema
                      </th>
                      <th>
                        TEMA
                      </th>
                      <th>
                        Fecha del Tema
                      </th>
                    </thead>
                    <tbody>
                      <?php $__empty_1 = true; $__currentLoopData = $subjects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subject): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                          <td><b>Bimestre-<?php echo e($subject->bimester); ?></b> / <b>Unidad-<?php echo e($subject->unit); ?></b> / <b>TEMA-<?php echo e($subject->position); ?></b></td>
                          <td><?php echo e($subject->name); ?></td>
                          <td><?php echo e($subject->created_at); ?></td>
                        </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                          <td colspan="4" class="text-center">No existen datos</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
	</div>



	</div>

	

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/subject/index.blade.php ENDPATH**/ ?>