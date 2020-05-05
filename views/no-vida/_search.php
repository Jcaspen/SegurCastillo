<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoVidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="no-vida-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'poliza') ?>

    <?= $form->field($model, 'tomador_dni') ?>

    <?= $form->field($model, 'riesgo') ?>

    <?= $form->field($model, 'integrantes') ?>

    <?php // echo $form->field($model, 'tipo_poliza') ?>

    <?php // echo $form->field($model, 'capital_asegurado') ?>

    <?php // echo $form->field($model, 'prima') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
