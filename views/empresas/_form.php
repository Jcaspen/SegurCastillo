<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'facturacion_anual')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital_asegurado')->textInput() ?>

    <?= $form->field($model, 'prima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
