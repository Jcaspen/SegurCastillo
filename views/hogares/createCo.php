<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hogares */

$this->title = 'Alta Comunidad';
$this->params['breadcrumbs'][] = ['label' => 'Hogares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hogares-create">

    <h1><?= Html::encode($this->title) ?></h1>

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
            <?= Html::submitButton('Alta', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
