<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\NoVida */

$this->title = 'Modificar No Vida: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'No Vidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';


$tipo_polizas=['RC'=>'RC','DJuridica'=> 'DJuridica','Agrícola'=>'Agrícola'
        ,'Viajes'=>'Viajes','Decesos'=>'Decesos'];
$tipo_riesgo=['Vehículo'=>'Vehículo','Maquinaria'=> 'Maquinaria','Animal'=>'Animal'
        ,'Personal'=>'Personal'];
?>
<div class="no-vida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="no-vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'riesgo')->dropdownList($tipo_riesgo) ?>

        <?= $form->field($model, 'integrantes')->dropdownList(['1'=>'1'
                                                              ,'2'=>'2'
                                                              ,'3'=>'3'
                                                              ,'4'=>'4'
                                                              ,'5'=>'5'
                                                              ,'6'=>'6']) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList($tipo_polizas) ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'prima')->textInput() ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var capital = document.getElementById("novida-capital_asegurado").value;
                        var integrantes = document.getElementById("novida-integrantes").value;
                        var prima= capital /20;
                        var prima2= prima * integrantes;
                        document.getElementById("novida-prima").value=Math.round(prima2);
                    });
        EOT;
        $this->registerJs($js);
        ?>
        <div class="form-group">
            <?= Html::Button('Recalcular Prima', ['class' => 'btn btn-info']) ?>
            <?= Html::a('Imprimir Póliza', ['report'], ['class' => 'btn btn-info']) ?>

            <p>

            </p>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
