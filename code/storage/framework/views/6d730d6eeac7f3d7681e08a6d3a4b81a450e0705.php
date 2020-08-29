<div class="sidebar" data-color="black" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          YachaywasiNet
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <?php if( Auth::user()->roles->first()->name == 'admin'): ?>
          <ul class="nav">
            <li class="<?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
              <a href="<?php echo e(route('dashboard')); ?>">
                <i class="fas fa-chart-line"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="<?php echo e(request()->routeIs('course.index') ? 'active' : ''); ?>">
              <a href="<?php echo e(route('course.index')); ?>">
                <i class="fas fa-users-cog"></i>
                <p>Áreas</p>
              </a>
            </li>
            <li class="<?php echo e(request()->routeIs('user.index') ? 'active' : ''); ?>">
              <a href="<?php echo e(route('user.index')); ?>">
                <i class="fas fa-users-cog"></i>
                <p>Docentes</p>
              </a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div><?php /**PATH /Users/julio/Desktop/dev/yachaywasinet/resources/views/layouts/sidebar.blade.php ENDPATH**/ ?>