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

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['2'=>'Salud']) ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'ocupacion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cuestionario')->dropdownList(['Si', 'No']) ?>

        <?= $form->field($model, 'prima')->dropdownList(['300'=>'Base-300', '500'=>'Oro-500', '650'=>'Platino -650']) ?>

        <div class="form-group">
            <?= Html::submitButton('Actualizar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
