
    <div class="container">
        <h2>Editing Demo</h2>
        <br>

        <?php echo render('demo/_form'); ?>
        <p>
            <?php echo Html::anchor('demo/view/' . $demo->id, 'View'); ?> |
            <?php echo Html::anchor('demo', 'Back'); ?></p>
    </div>