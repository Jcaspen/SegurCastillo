<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alta Vida', ['create'], ['class' => 'btn btn-success']) ?>
        <?php
        if (\Yii::$app->user->can('controlPlanp')){
            Html::a('Alta Plan de Pensiones', ['createpl'], ['class' => 'btn btn-success']);
        }?>

        <?= Html::a('Alta Salud', ['createsalud'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
    <div class="text-center">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </div>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'poliza',
            'tomador_dni',
            'tipo_poliza',
            //'ingreso_mensual',
            'capital',
            //'cuestionario',
            'prima',
            'agente',

            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   'view' => function ($url, $model, $key) {
                       return Html::a(
                           'Imprimir',
                           ['vida/report', 'id' => $key],
                       );
                   },
                   'update' => function ($url, $model, $key) {
                       return Html::a(
                           'Modificar',
                           ['vida/update', 'id' => $key],
                       );
                   },
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['vida/delete', 'id' => $key],
                           [
                               'data-method' => 'POST',
                               'data-confirm' => '¿Seguro que desea eliminar la póliza?',
                           ]
                       );
                   },
               ],
           ],
        ],
    ]); ?>


</div>
