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


    <div>
        <?= Html::a('Empresas', ['empresas/index'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Clientes', ['clientes/index'], ['class' => 'btn btn-success']) ?>
    </div>
</div>
