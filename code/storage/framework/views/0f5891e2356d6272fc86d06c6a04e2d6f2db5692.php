<?php $__env->startSection('content'); ?>

<div class="container-fluid bg-light p-5">
	
	<h1><i class="fas fa-file-alt"></i> Temas</h1>
	<div class="content">
		<div class="row">
			
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
					<th scope="col">Tema</th>
					<th scope="col">Bimestre</th>
					<th scope="col">Unidad</th>
					<th scope="col">Estado</th>
					<th scope="col">Fecha</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $__currentLoopData = $temas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				  		<tr>
				  			<td>
						      	<a href="<?php echo e(route('temadetalle', ['tema_id'=>$tema->id])); ?>" style='font-size: 2.4em'><?php echo e($tema->position); ?> - <?php echo e($tema->name); ?>

						      	</a>
						      	<p><span>Lunes, 8 de Agosto - 2020</span></p>
						      </td>
					      <th scope="row">
					      	Bimestre - <?php echo e($tema->bimester); ?>

					      </th>
					      <td>Unidad - <?php echo e($tema->unit); ?></td>
					      <td>Pendiente</td>
					      <td><a href="<?php echo e(route('temadetalle', ['tema_id'=>$tema->id])); ?>">Ver tema</a></td>
					    </tr>
			  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  </tbody>
			</table>	

		</div>

		<div class="row">
			<div class="col-12 col-md-8">
				<?php $__currentLoopData = $bimestres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $bimestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<h2 class="text-success"><b>BIMESTRE <?php echo e($bimestre->bimester); ?></b></h2>
					
					<?php $__currentLoopData = $unidades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $unidad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<h3 class="text-success"><b>UNIDAD <?php echo e($unidad->unit); ?></b></h3>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="col-12 col-md-4">
				
			</div>
		</div>
			
	</div>

</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /app/resources/views/admin/subject/list.blade.php ENDPATH**/ ?>