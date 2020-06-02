<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Siniestros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siniestros-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_poliza')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capital_desenbolsado')->textInput() ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
