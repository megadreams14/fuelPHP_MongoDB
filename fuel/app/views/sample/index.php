<h2>Listing Samples</h2>
<br>
<?php var_dump($view_data); ?>
<?php $samples = $view_data; ?>
<?php if ($samples): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Id</th>
			<th>Platform</th>
			<th>Site</th>
			<th>Sales</th>
			<th>Member</th>
			<th>Active</th>
			<th></th>
		</tr>
	</thead>
	<tbody>s
<?php foreach ($samples as $sample): ?>		<tr>

			<td><?php echo $sample->id; ?></td>
			<td><?php echo $sample->platform; ?></td>
			<td><?php echo $sample->site; ?></td>
			<td><?php echo $sample->sales; ?></td>
			<td><?php echo $sample->member; ?></td>
			<td><?php echo $sample->active; ?></td>
			<td>
				<?php echo Html::anchor('sample/view/'.$sample->id, 'View'); ?> |
				<?php echo Html::anchor('sample/edit/'.$sample->id, 'Edit'); ?> |
				<?php echo Html::anchor('sample/delete/'.$sample->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Samples.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sample/create', 'Add new Sample', array('class' => 'btn btn-success')); ?>

</p>
