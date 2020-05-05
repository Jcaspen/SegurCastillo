<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresas */

$this->title = 'Create Empresas';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="empresas-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cif')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'facturacion_anual')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'capital_asegurado')->textInput() ?>

        <?= $form->field($model, 'prima')->textInput() ?>
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
