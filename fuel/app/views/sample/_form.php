<?php echo Form::open(); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Id', 'id'); ?>

			<div class="input">
				<?php echo Form::input('id', Input::post('id', isset($sample) ? $sample->id : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Platform', 'platform'); ?>

			<div class="input">
				<?php echo Form::input('platform', Input::post('platform', isset($sample) ? $sample->platform : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Site', 'site'); ?>

			<div class="input">
				<?php echo Form::input('site', Input::post('site', isset($sample) ? $sample->site : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Sales', 'sales'); ?>

			<div class="input">
				<?php echo Form::input('sales', Input::post('sales', isset($sample) ? $sample->sales : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Member', 'member'); ?>

			<div class="input">
				<?php echo Form::input('member', Input::post('member', isset($sample) ? $sample->member : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Active', 'active'); ?>

			<div class="input">
				<?php echo Form::input('active', Input::post('active', isset($sample) ? $sample->active : ''), array('class' => 'span4')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>