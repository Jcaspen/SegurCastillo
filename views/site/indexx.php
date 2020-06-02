<?php

use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'SegurCastillo';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>SegurCastillo</h1>
        <p class="lead">Tu aplicación de seguros de confianza.</p>
    </div>
    <div class="jumbotron">
        <p>
            <?= Html::a('Clientes', ['clientes/index'], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Siniestros', ['siniestros/index'], ['class' => 'btn btn-success']) ?>
        </p>
        <?= Html::a('Empresas', ['empresas/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Vida', ['vida/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Hogares', ['hogares/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Autos', ['autos/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('No Vida', ['no-vida/index'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
