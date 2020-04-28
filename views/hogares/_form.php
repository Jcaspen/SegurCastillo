<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hogares */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hogares-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poblacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cp')->textInput() ?>

    <?= $form->field($model, 'viviendas')->textInput() ?>

    <?= $form->field($model, 'metros_cuadrados')->textInput() ?>

    <?= $form->field($model, 'capital_asegurado')->textInput() ?>

    <?= $form->field($model, 'prima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
