<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HogaresSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hogares-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'poliza') ?>

    <?= $form->field($model, 'tomador_dni') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'poblacion') ?>

    <?php // echo $form->field($model, 'provincia') ?>

    <?php // echo $form->field($model, 'cp') ?>

    <?php // echo $form->field($model, 'viviendas') ?>

    <?php // echo $form->field($model, 'metros_cuadrados') ?>

    <?php // echo $form->field($model, 'capital_asegurado') ?>

    <?php // echo $form->field($model, 'prima') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
