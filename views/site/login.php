<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Acceso';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Bienvenido al Portal SegurCastillo, introduce tu usuario y contraseña:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'horizontalCssClasses' => ['wrapper' => 'col-sm-5'],
        ],
    ]); ?>

        <?= $form->field($model, 'usuario')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'contraseña')->passwordInput() ?>

        <?= $form->field($model, 'recordarme')->checkbox() ?>

        <div class="form-group">
            <div class="offset-sm-2">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>

</div>
