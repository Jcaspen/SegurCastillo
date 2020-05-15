<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Vida */

$this->title = 'Alta Salud';
$this->params['breadcrumbs'][] = ['label' => 'Pólizas Vida', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="vida-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tipo_poliza')->dropdownList(['Salud']) ?>

        <?= $form->field($model, 'tomador_dni')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cuestionario')->dropdownList(['Si', 'No']) ?>

        <?= $form->field($model, 'prima')->dropdownList(['300'=>'Base-300', '500'=>'Oro-500', '650'=>'Platino -650']) ?>

                <div class="form-group">
                    <?= Html::submitButton('Emitir', ['class' => 'btn btn-success']) ?>
                </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
