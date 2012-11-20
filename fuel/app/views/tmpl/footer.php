<?php
//固定用footer
?>
        <footer>
            Copyright &copy <? echo $copy_year; ?> CYBIRD Co.,Ltd All Rights Reserved.
        </footer>
        <?php echo Asset::js('jquery.js'); ?>
        <?php echo Asset::js('bootstrap.js'); ?>
        <?php echo Asset::js('highcharts.js'); ?>
        <?php
            foreach ($plus_js as $js) {
                echo Asset::js($js);
            }
        ?>
        <?php if (isset($php_js) === true) {?>
        <script>
            <?php echo $php_js;?>
        </script>
        <?php }?>
    </body>
</html>
