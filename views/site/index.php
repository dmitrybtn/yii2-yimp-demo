<?php

/* @var $this yii\web\View */

use yii\bootstrap4\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Hey there!</h1>

        <p class="lead">This is live demo for YIMP - dashboard for <a href="http://yiiframework.com" target="_blank">Yii Framework</a> based on
            <a href="https://getbootstrap.com" target="_blank">Bootstrap 4</a>.</p>

        <p>
            <?php echo Html::a('YIMP on Github', 'https://github.com/dmitrybtn/yii2-yimp') ?>
            <?php echo Html::a('YIMP on Packagist', 'https://packagist.org/packages/dmitrybtn/yii2-yimp') ?>

        </p>
    </div>

</div>
