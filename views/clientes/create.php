<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clientes */

$this->title = 'Alta Clientes';
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clientes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="clientes-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'dni')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'fecha_nac')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
