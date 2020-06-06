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
            <?= Html::a('Clientes', ['clientes/index'], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Siniestros', ['siniestros/index'], ['class' => 'btn btn-primary']) ?>
        </p>

        <?php if (Yii::$app->user->can('controlEmpresa')){ ?>

              <?= Html::a('Empresas', ['empresas/index'], ['class' => 'btn btn-primary']) ?>

        <?php  } ?>

        <?= Html::a('Vida', ['vida/index'], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Hogares', ['hogares/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Autos', ['autos/index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('No Vida', ['no-vida/index'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
</div>
