<?php $__env->startSection('content'); ?>

<?php if( Auth::user()->roles->first()->name == 'admin'): ?>
<div class="content">
  <!-- 
  <div class="row mb-3">
    <div class="col">
      <div class="update ml-auto mr-auto">
        <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-round">Registrar Docente</a>
      </div>
    </div>
  </div>

-->
  <div class="row">
    <div class="col">
      <h3 class="text-primary">Lista de Docentes - <?php echo e($docentes->count()); ?> - Colaboradores</h3>
    </div>
  </div>
  <div class="row">
    <?php $__currentLoopData = $docentes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats" style="height: 180px;">
          <div class="card-body ">
            <div class="row">
              <div class="col-3 col-md-3">
                <div class="icon-big text-center icon-warning">
                  <?php if($docente->avatar == null): ?>
                  <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                    <img src="images/avatar/guest-user.jpg" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                  </figure>
                  <?php else: ?>
                  <figure class="figure bg-secondary rounded-circle" style="width: 64px; height: 64px; overflow: hidden;">
                    <img src="images/avatar/<?php echo e($docente->avatar); ?>" class="figure-img img-fluid rounded" alt="<?php echo e($docente->name); ?>" style="">
                  </figure>
                  <?php endif; ?>
                  <!--<i class="fas fa-laptop-code text-primary"></i>-->
                </div>
              </div>
              <div class="col-9 col-md-9">
                <div class="">
                  <h5 class="text-danger"><a href=" <?php echo e(route('user.show', $docente->id)); ?> "><?php echo e($docente->name); ?></a></h5>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats text-primary">
              <i class="fas fa-book-reader text-danger"></i>
              Docente del 3ero Grado
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
  </div>
</div>
<?php endif; ?>

<?php if( Auth::user()->roles->first()->name == 'editor'): ?>
<div class="content">

        <div class="row">
          <div class="col">
            <div class="update ml-auto mr-auto">
              <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-round">Registrar Alumno</a>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-chalkboard-teacher text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Docentes</p>
                      <p class="card-title">20<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update Now
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-user-graduate text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Alumnos Matriculados</p>
                      <p class="card-title">320<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar-o"></i>
                  Last day
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-shapes text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Temas publicados</p>
                      <p class="card-title">1450<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-clock-o"></i>
                  In the last hour
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="fas fa-laptop-code text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Cursos</p>
                      <p class="card-title">+45K<p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-refresh"></i>
                  Update now
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Users Behavior</h5>
                <p class="card-category">24 Hours performance</p>
              </div>
              <div class="card-body ">
                <canvas id=chartHours width="400" height="100"></canvas>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> Updated 3 minutes ago
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Opened
                  <i class="fa fa-circle text-warning"></i> Read
                  <i class="fa fa-circle text-danger"></i> Deleted
                  <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of emails sent
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">NASDAQ: AAPL</h5>
                <p class="card-category">Line Chart with Points</p>
              </div>
              <div class="card-body">
                <canvas id="speedChart" width="400" height="100"></canvas>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i> Tesla Model S
                  <i class="fa fa-circle text-warning"></i> BMW 5 Series
                </div>
                <hr />
                <div class="card-stats">
                  <i class="fa fa-check"></i> Data information certified
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php endif; ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>