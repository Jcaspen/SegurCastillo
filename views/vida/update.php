<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */

$this->title = 'Modificar Vida: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'Vidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar Vida';
?>
<div class="vida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['0'=>'Vida']) ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ingreso_mensual')->textInput() ?>

        <?= $form->field($model, 'ingresos_anuales')->textInput(['readonly'=>true]) ?>

        <?= $form->field($model, 'capital')->dropdownList(['150000'=>'150000', '300000'=>'300000', '600000'=>'600000', '1000000'=>'1000000']) ?>

        <?= $form->field($model, 'cuestionario')->dropdownList(['Si', 'No']) ?>

        <?= $form->field($model, 'prima')->textInput(['readonly'=>true]) ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var ingresoMensual = document.getElementById("vida-ingreso_mensual").value;
                        var capital = document.getElementById("vida-capital").value;
                        var ingresoAnual = ingresoMensual * 14;
                        var dos = ingresoMensual * 5 / 10 ;
                        var prima= capital / dos ;
                        document.getElementById("vida-ingresos_anuales").value=Math.round(ingresoAnual);
                        document.getElementById("vida-prima").value=Math.round(prima);
                    });
        EOT;
        $this->registerJs($js);
        ?>
                <?= Html::Button('Recalcular Prima', ['class' => 'btn btn-info']) ?>

                <p>

                </p>

        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
