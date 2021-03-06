<?php $__env->startSection('contenido'); ?>
<div class="row">
	<div class="col-lg-8 col-md-6 col-sm-6 col-xs-12">
		<h3>
			Nueva Abscisa</h3> <a href="http://localhost:8000/traza/abscisas"><button class="btn btn-success">Retornar</button></a>
			<?php if(count($errors)> 0 ): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>

			<?php echo Form::open(array('url'=>'traza/abscisas','method'=>'POST','autocomplete'=>'off','files'=>'true')); ?>

			<?php echo e(Form::token()); ?>

			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" class="form-control" value ="K" placeholder="Nombre...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="form-group">
							<label>Descripción</label>
							<select name="descripcion" class="form-control">
								
								<option value="LD">L/DERECHO
								<option value="LI">L/IZQUIERDO
								<option value="E">EJE
								</option>
								
							</select>


						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_excavado_teorico">Volumen Diseño Corte</label>
						<input type="text" name="volumen_excavado_teorico" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" value="0" class="form-control" placeholder="Volumen corte  teorico...">

					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_llenado_teorico">Volumen Diseño Lleno</label>
						<input type="hidden" name="estadoAbscisa" value="1"  class="form-control" placeholder="coef/real exc ...">
						<input type="text" value="0" name="volumen_llenado_teorico" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"   class="form-control" placeholder="Volumen llenado teorico...">

					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_excavado_obra">Volumen Ejecutado Corte</label>
						<input type="text" name="volumen_excavado_obra" value="0"  pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})"  class="form-control" placeholder="volumen exc/obra...">

					</div>
				</div>
				
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="form-group">
						<label for="volumen_llenado_obra">Volumen Ejecutado Lleno</label>
						<input type="text" name="volumen_llenado_obra" pattern="([0-9]){0,10}([0-9]{0,10}.[0-9]{0,10})" value="0" class="form-control" placeholder="volumen llenado/obra...">

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