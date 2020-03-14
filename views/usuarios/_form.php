<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">
    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'rol')->dropdownList(['admin' => 'Administrador', 'mediador' => 'Mediador', 'agente' => 'Agente']) ?>

        <div class="form-group">
            <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div>
