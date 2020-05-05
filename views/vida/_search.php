<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'poliza') ?>

    <?= $form->field($model, 'tomador_dni') ?>

    <?= $form->field($model, 'ocupacion') ?>

    <?= $form->field($model, 'ingresos_anuales') ?>

    <?php // echo $form->field($model, 'tipo_poliza') ?>

    <?php // echo $form->field($model, 'ingreso_mensual') ?>

    <?php // echo $form->field($model, 'capital') ?>

    <?php // echo $form->field($model, 'cuestionario') ?>

    <?php // echo $form->field($model, 'prima') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
