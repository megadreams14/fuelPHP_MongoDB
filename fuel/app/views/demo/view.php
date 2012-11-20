<?php
$demo = $view_data['demo'];
?>

<div class="container">
    <h2>Viewing #<?php echo $demo->id; ?></h2>

    <p>
        <strong>Id:</strong>
        <?php echo $demo->id; ?></p>
    <p>
        <strong>Name:</strong>
        <?php echo $demo->name; ?></p>
    <p>
        <strong>Data:</strong>
        <?php echo $demo->data; ?></p>

    <?php echo Html::anchor('demo/edit/' . $demo->id, 'Edit'); ?> |
    <?php echo Html::anchor('demo', 'Back'); ?>
</div>