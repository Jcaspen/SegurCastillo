<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Siniestros */

$this->title = 'Modificar Siniestro: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'Siniestros', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';


$tipo_polizas=['Comunidad'=>'Comunidad','Hogar'=> 'Hogar','Vida'=> 'Vida','Empresa'=> 'Empresa','Autos'=> 'Autos'
        ,'Bicis'=> 'Bicis','RC'=>'RC','DJuridica'=> 'DJuridica','Agrícola'=>'Agrícola'
        ,'Viajes'=>'Viajes','Decesos'=>'Decesos'];
?>
<div class="siniestros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="siniestros-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList([$tipo_polizas],['readonly' => true]) ?>

        <?= $form->field($model, 'capital_desenbolsado')->textInput() ?>

        <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>

</div>
