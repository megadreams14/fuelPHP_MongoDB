<?php
//固定header
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <?php echo Asset::css('bootstrap.css'); ?>
        <?php echo Asset::css('bootstrap.min.css'); ?>
        <?php
        foreach ($plus_css as $css) {
            echo Asset::css($css);
        }
        ?>
    </head>
    <body>