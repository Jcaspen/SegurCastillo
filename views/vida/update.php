<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */

$this->title = 'Modificar Vida: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'Vidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar Vida';
?>
<div class="vida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ingresos_anuales')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['Vida','Plan de Pensiones', 'Salud']) ?>

        <?= $form->field($model, 'ingreso_mensual')->textInput() ?>

        <?= $form->field($model, 'capital')->textInput() ?>

        <?= $form->field($model, 'cuestionario')->textInput() ?>

        <?= $form->field($model, 'prima')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
