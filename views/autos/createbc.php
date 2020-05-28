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
?>
<div class="autos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="autos-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_auto')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'caballos')->textInput() ?>

        <?= $form->field($model, 'tipo_poliza')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'prima')->textInput() ?>

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
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
