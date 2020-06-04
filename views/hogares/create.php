<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Hogares */

$this->title = 'Alta Hogar';
$this->params['breadcrumbs'][] = ['label' => 'Hogares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$model->agente = Yii::$app->user->identity->login;
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

        <?= $form->field($model, 'metros_cuadrados')->textInput() ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'agente')->dropdownList([$model->agente=>$model->agente]) ?>

        <?= $form->field($model, 'prima')->textInput(['readonly'=>true]) ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var metros = document.getElementById("hogares-metros_cuadrados").value;
                        var capital = document.getElementById("hogares-capital_asegurado").value;
                        var prima= capital / metros;
                        document.getElementById("hogares-prima").value=Math.round(prima);
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
            <?= Html::submitButton('Alta', ['class' => 'btn btn-success']) ?>
        </div>


        <?php ActiveForm::end(); ?>

    </div>

</div>
