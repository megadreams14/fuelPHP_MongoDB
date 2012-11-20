<?php
$demos = $view_data['demos'];
?>
<div class="container">
    <h2>Listing Demos</h2>
    <br>
    <?php if ($demos): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Data</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($demos as $demo): ?>		<tr>

                        <td><?php echo $demo->id; ?></td>
                        <td><?php echo $demo->name; ?></td>
                        <td><?php echo $demo->data; ?></td>
                        <td>
                            <?php echo Html::anchor('demo/view/' . $demo->id, 'View'); ?> |
                            <?php echo Html::anchor('demo/edit/' . $demo->id, 'Edit'); ?> |
                            <?php echo Html::anchor('demo/delete/' . $demo->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

                        </td>
                    </tr>
                <?php endforeach; ?>	</tbody>
        </table>

    <?php else: ?>
        <p>No Demos.</p>

    <?php endif; ?><p>
        <?php echo Html::anchor('demo/create', 'Add new Demo', array('class' => 'btn btn-success')); ?>

    </p>
</div>
