<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title><?php echo e(config('app.name', 'Laravel')); ?></title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  

  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  
  
  <!-- CSS Just for demo purpose, don't include it in your project -->
 <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet" />
  <link href="<?php echo e(asset('css/paper-dashboard.css?v=2.0.1')); ?>" rel="stylesheet" />
  
  <link href="<?php echo e(asset('demo/demo.css')); ?>" rel="stylesheet" />
</head>

<body class="">
  
  

  <div class="wrapper">
    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="main-panel" style="height: 100vh;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">Colegio Lev S. Vigotsky - Los Olivos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">

            	<li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                </div>
              </li>
              
              <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                    </li>
                    <?php if(Route::has('register')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                        </li>
                    <?php endif; ?>
                <?php else: ?>
                    <li class="nav-item btn-rotate dropdown">
                    	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <!--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>-->
                            <?php echo e(Auth::user()->name); ?> <!--<span class="caret"></span>-->
                        </a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                <?php echo e(__('Logout')); ?>

                            </a>
						</div>

						<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>

                    </li>
                <?php endif; ?>


            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!--<h3 class="description">Your content here</h3>-->

            <?php echo $__env->yieldContent('content'); ?>
          </div>
        </div>
      </div>
      <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo e(asset('js/core/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/core/popper.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/core/bootstrap.min.js')); ?>"></script>
  <script src="<?php echo e(asset('js/plugins/perfect-scrollbar.jquery.min.js')); ?>"></script>
  
  <!--  Google Maps Plugin    
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  -->
  <!-- Chart JS -->
  <script src="<?php echo e(asset('js/plugins/chartjs.min.js')); ?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo e(asset('js/plugins/bootstrap-notify.js')); ?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo e(asset('js/paper-dashboard.min.js?v=2.0.1')); ?>" type="text/javascript"></script>

  <script src="<?php echo e(asset('js/javascript.js')); ?>"></script>

  <!-- Script para el modal de active -->
  <script>
    $('#exampleModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var idUser = button.data('id') // Extract info from data-* attributes
      var statusUser = button.data('status') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-user-active').text('New message to ' + idUser)
      modal.find('.modal-body #id').val(idUser)
      modal.find('.modal-body #status').val(statusUser)

      if(statusUser == 0){
        $('#opc-active').text('Pendiente')
      }else{
        $('#opc-active').text('Activo')
      }


    })
    var modal = $('#exampleModal')
    $('.dropdown-item').click(function(){
      $('#opc-active').text($(this).text());
      modal.find('.modal-body #status').val($(this).data('index'))
    })

    $('.btn-delete-user').click(function(){
      $('#form-delete-user').submit();
    })

    $('.btn-delete-course').click(function(){
      $('#form_delete_coutse').submit();
    })

  </script>

  <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH /app/resources/views/layouts/app.blade.php ENDPATH**/ ?>