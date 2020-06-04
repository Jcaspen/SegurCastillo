<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = 'Crear Usuarios';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$url = Url::to(['usuarios/loguear']);
$js = <<<EOT
$('#usuarios-login').on('change', function (e) {
    var el = $(this);
    var login = el.val();
    $.ajax({
        method: 'GET',
        url: '$url',
        data: {
            login: login
        },
        success: function (data, code, jqXHR) {
            var sel = $('#usuarios-login');
            sel.empty();
            for (var i in data) {
                sel.append(`<option value="\${i}">\${data[i]}</option>`);
            }
        }
    });
});
EOT;
$this->registerJs($js);

?>
<div class="usuarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="usuarios-form">
        <?php $form = ActiveForm::begin([
            'id' => 'usuarios-create',
       ]); ?>
            <?= $form->field($model, 'login',['enableAjaxValidation' => true])->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'rol')->dropdownList(['admin' => 'Administrador', 'mediador' => 'Mediador', 'agente' => 'Agente']) ?>

            <div class="form-group">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>
