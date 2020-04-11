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

$url = Url::to(['usuarios/usuario']);
$js = <<<EOT
$('#usuarios-login').on('change', function (ev) {
    var el = $(this);
    var login = el.val();
    if (login === '') {
        $('#usuarios-login').empty();
        $('#usuarios-login').append('<option value=" "></option>');
        return;
    }
    $.ajax({
        method: 'GET',
        url: '$url',
        data: {
            login: login
        },
        success: function (data, code, jqXHR) {
            var sel = $('#usuarios-login');
            sel.empty();
            sel.append(`<option value="\${i}">\${data[i]}</option>`);
            var option = document.createElement('option');
            option.value = i;
            option.innerHTML = data[i];
            sel.append(option);
            $('#usuarios-login').trigger('change');
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
            'id'=> 'usuarios-form',
       ]); ?>
            <?= $form->field($model, 'login')->textInput(['maxlength' => true,'enableAjaxValidation' => true]) ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'rol')->dropdownList(['admin' => 'Administrador', 'mediador' => 'Mediador', 'agente' => 'Agente']) ?>

            <div class="form-group">
                <?= Html::submitButton('Registrar', ['class' => 'btn btn-success']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

</div>