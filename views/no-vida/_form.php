<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoVida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="no-vida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'riesgo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'integrantes')->textInput() ?>

    <?= $form->field($model, 'tipo_poliza')->dropdownList([$tipo_polizas],['readonly' => true]) ?>

    <?= $form->field($model, 'capital_asegurado')->textInput() ?>

    <?= $form->field($model, 'prima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
