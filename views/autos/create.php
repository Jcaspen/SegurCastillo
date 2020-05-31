<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use kartik\mpdf\Pdf;

/* @var $this yii\web\View */
/* @var $model app\models\Autos */

$this->title = 'Alta Autos';
$this->params['breadcrumbs'][] = ['label' => 'Autos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


$marcas=['BMW'=>'BMW','Citröen'=> 'Citröen','Dacia'=> 'Dacia','Fiat'=> 'Fiat','Ford'=> 'Ford'
        ,'Infiniti'=> 'Infiniti','Kia'=>'Kia','Mazda'=> 'Mazda','Mercedes'=>'Mercedes'
        ,'Nissan'=>'Nissan','Opel'=>'Opel','Peugeot'=>'Peugeot','Renault'=>'Renault'
        ,'Opel'=>'Opel','Toyota'=>'Toyota','Volkswagen'=>'Volkswagen','Volvo'=>'Volvo'];
?>
<div class="autos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="autos-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['Autos'=>'Autos'],['readonly' => true]) ?>

        <?= $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tipo_auto')->dropdownList(['Turismo'=>'Turismo'
                                                            ,'Derivado de Turismo'=> 'Derivado de Turismo'
                                                            ,'Todoterreno'=>'Todoterreno'
                                                            ,'Furgón'=>'Furgón'
                                                            ,'Ciclomotores'=>'Ciclomotores'
                                                            ,'Motos'=>'Motos'],['readonly' => true]) ?>

        <?= $form->field($model, 'marca')->dropdownList([$marcas],['readonly' => true]) ?>

        <?= $form->field($model, 'modelo')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'caballos')->textInput() ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'prima')->textInput() ?>

        <?php
                 $js = <<<EOT
                    $(':button').click(function (event) {
                        var capital = document.getElementById("autos-capital_asegurado").value;
                        var caballos= document.getElementById("autos-caballos").value;
                        var prima= capital * caballos;
                        var prima2= prima /19000;
                        document.getElementById("autos-prima").value=Math.round(prima2);
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
