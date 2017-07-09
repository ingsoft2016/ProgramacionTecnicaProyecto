<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Editar Material  :<?php echo e($material->nombre); ?></h3>
			<?php if(count($errors)> 0 ): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::model($material,['method'=>'PATCH','action'=>['MaterialController@update',$material->idMaterial]]); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control"
 							value="<?php echo e($material->nombre); ?>" 
						 placeholder="Nombre...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripción
						</label>
						<input type="text" name="descripcion" class="form-control" 	value="<?php echo e($material->descripcion); ?>" 

						placeholder="Descripcion...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="compactacion">Compactación</label>
						<input type="text" name="compactacion" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" class="form-control" 	value="<?php echo e($material->compactacion); ?>" 

						placeholder="volumen...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="text" name="precio" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"  class="form-control" 	value="<?php echo e($material->precio); ?>" 

						placeholder="precio...">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="form-group">
					<label> </label>
					<div>
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button  class="btn btn-danger" type="reset">Cancelar</button>
					</div>
				</div>
			</div>
			</div>
			
		</div>
	</div>
	<?php echo Form::close(); ?>


	<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>