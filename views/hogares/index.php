<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HogaresSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hogares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hogares-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alta Hogar', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Alta Comunidad', ['createco'], ['class' => 'btn btn-success']) ?>
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
            'direccion',
            'poblacion',
            'provincia',
            'cp',
            //'viviendas',
            //'metros_cuadrados',
            //'capital_asegurado',
            'prima',
            'agente',

            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   'update' => function ($url, $model, $key) {
                       return Html::a(
                           'Modificar',
                           ['hogares/update', 'id' => $key],
                       );
                   },
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['hogares/delete', 'id' => $key],
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
