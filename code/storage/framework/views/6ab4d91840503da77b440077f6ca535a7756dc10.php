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
  <div class="wrapper h-100">
    <div class="main-panel" style="height: 100vh; width: 100%;">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <!-- menu hamburguesa ********** --> 
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <!-- end menu hamburguesa ********** --> 
            <a class="navbar-brand" href="javascript:;">Colegio Lev S. Vigotsky - Los Olivos</a>
          </div>
          <!-- menu 3 puntitos ... ********** --> 
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <!-- end menu 3 puntitos ... ********** --> 
          
          <!-- Menu Login y Registro --> 
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">              
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
          <!-- end Menu Login y Registro --> 
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <?php echo $__env->yieldContent('content'); ?>
          </div>
        </div>
      </div>
      
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
  
</body>

</html>
<?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/layouts/errors.blade.php ENDPATH**/ ?>