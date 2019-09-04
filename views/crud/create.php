<?php

/* @var $this yii\web\View */
/* @var $model app\models\Demo */

?>
<div class="demo-create">

    <?= $this->render('_form', [
        'model' => $model,
        'cancelUrl' => $cancelUrl,
    ]) ?>

</div>
