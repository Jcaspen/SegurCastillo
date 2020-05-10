<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */

$this->title = 'Alta Vida';
$this->params['breadcrumbs'][] = ['label' => 'Pólizas Vida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ingresos_anuales')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['Vida', 'Salud','Plan de Pensiones']) ?>

        <?= $form->field($model, 'ingreso_mensual')->textInput() ?>

        <?= $form->field($model, 'capital')->dropdownList(['150000', '300000', '600000', '1000000']) ?>

        <?= $form->field($model, 'cuestionario')->dropdownList(['Si', 'No']) ?>

        <?= $form->field($model, 'prima')->textInput(['readonly'=>true]) ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var facturacion = document.getElementById("empresas-facturacion_anual").value;
                        var capital = document.getElementById("empresas-capital_asegurado").value;
                        var prima= facturacion / 130 + capital /150;
                        document.getElementById("empresas-prima").value=Math.round(prima);
                    });
        EOT;
        $this->registerJs($js);
        ?>
                <?= Html::Button('Calcular Prima', ['class' => 'btn btn-info']) ?>

                <p>

                </p>
                <div class="form-group">
                    <?= Html::submitButton('Emitir', ['class' => 'btn btn-success']) ?>
                </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
