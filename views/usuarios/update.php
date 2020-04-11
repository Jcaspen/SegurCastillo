<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Modificar Usuarios: ' . $model->login;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="usuarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="usuarios-form">
        <?php $form = ActiveForm::begin([
       ]); ?>
            <?= $form->field($model, 'login')->textInput(['maxlength' => true, 'readonly'=>true]) ?>
            <?= $form->field($model, 'rol')->dropdownList(['admin' => 'Administrador', 'mediador' => 'Mediador', 'agente' => 'Agente']) ?>

            <div class="form-group">
                <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
