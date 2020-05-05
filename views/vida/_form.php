<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingresos_anuales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_poliza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ingreso_mensual')->textInput() ?>

    <?= $form->field($model, 'capital')->textInput() ?>

    <?= $form->field($model, 'cuestionario')->textInput() ?>

    <?= $form->field($model, 'prima')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
