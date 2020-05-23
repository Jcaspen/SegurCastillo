<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Hogares */

$this->title = 'Modificar Hogar: ' . $model->tomador_dni;
$this->params['breadcrumbs'][] = ['label' => 'Hogares', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar Póliza';
?>
<div class="hogares-update">

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


                <?php
                         $js = <<<EOT
                            $(':button').click(function (event) {
                                var metros = document.getElementById("hogares-metros_cuadrados").value;
                                var capital = document.getElementById("hogares-capital_asegurado").value;
                                var viviendas = document.getElementById("hogares-viviendas").value;

                                if(document.getElementById("hogares-viviendas").value==1){
                                    var prima= capital / metros;
                                    document.getElementById("hogares-prima").value=Math.round(prima);
                                }
                                var prima= (capital / metros)*viviendas / 1.5 ;
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
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
