<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Id', 'id'); ?>

			<div class="input">
				<?php echo Form::input('id', Input::post('id', isset($demo) ? $demo->id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($demo) ? $demo->name : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Data', 'data'); ?>

			<div class="input">
				<?php echo Form::input('data', Input::post('data', isset($demo) ? $demo->data : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>