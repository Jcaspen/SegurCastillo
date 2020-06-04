<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */

$this->title = 'Modificar Plan de Pensiones';
$this->params['breadcrumbs'][] = ['label' => 'Pólizas Vida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->agente = Yii::$app->user->identity->login;
?>
<div class="vida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['1'=>'Plan de Pensiones']) ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cuestionario')->dropdownList(['Si', 'No']) ?>

        <?= $form->field($model, 'agente')->dropdownList([$model->agente=>$model->agente]) ?>

        <?= $form->field($model, 'prima')->dropdownList(['50'=>'50', '100'=>'100', '500'=>'500', '1000'=>'1000', '3000'=>'3000']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Emitir', ['class' => 'btn btn-success']) ?>
                </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
