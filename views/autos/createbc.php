<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = 'Alta Bicicletas';
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->agente = Yii::$app->user->identity->login;

$marcas=['Specialized'=>'Specialized','Scott'=> 'Scott','Trek'=> 'Trek','Giant'=> 'Giant','Canyon'=> 'Canyon'
        ,'Orbea'=> 'Orbea','BMC'=>'BMC'];


?>
<div class="autos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="autos-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['Bicicleta'=>'Bicicleta'],['readonly' => true]) ?>

        <?= $form->field($model, 'marca')->dropdownList([$marcas],['readonly' => true]) ?>

        <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'agente')->dropdownList([$model->agente=>$model->agente]) ?>

        <?= $form->field($model, 'prima')->textInput(['readonly'=>true]) ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var capital = document.getElementById("autos-capital_asegurado").value;
                        var prima= capital / 18 ;
                        document.getElementById("autos-prima").value=Math.round(prima);
                    });


        EOT;
        $this->registerJs($js);
        ?>
        <div class="form-group">
            <?= Html::Button('Calcular Prima', ['class' => 'btn btn-info']) ?>
            <?= Html::a('Imprimir Póliza', ['report'], ['class' => 'btn btn-info']) ?>

            <p>

            </p>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Emitir', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
