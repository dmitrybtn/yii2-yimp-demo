<?php

use yii\widgets\ActiveForm;
use dmitrybtn\yimp\widgets\Controls;

/* @var $this yii\web\View */
/* @var $model app\models\Demo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


    <?php echo Controls::widget([
        'form' => $form,
        'cancelUrl' => $cancelUrl,
    ]) ?>

    <?php ActiveForm::end(); ?>

</div>
