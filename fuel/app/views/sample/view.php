<h2>Viewing #<?php echo $sample->id; ?></h2>

<p>
	<strong>Id:</strong>
	<?php echo $sample->id; ?></p>
<p>
	<strong>Platform:</strong>
	<?php echo $sample->platform; ?></p>
<p>
	<strong>Site:</strong>
	<?php echo $sample->site; ?></p>
<p>
	<strong>Sales:</strong>
	<?php echo $sample->sales; ?></p>
<p>
	<strong>Member:</strong>
	<?php echo $sample->member; ?></p>
<p>
	<strong>Active:</strong>
	<?php echo $sample->active; ?></p>

<?php echo Html::anchor('sample/edit/'.$sample->id, 'Edit'); ?> |
<?php echo Html::anchor('sample', 'Back'); ?>