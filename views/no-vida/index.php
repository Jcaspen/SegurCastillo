<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoVidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'No Vidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-vida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Alta No Vida', ['create'], ['class' => 'btn btn-success']) ?>
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
            'riesgo',
            'tipo_poliza',
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
                           ['no-vida/update', 'id' => $key],
                       );
                   },
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['no-vida/delete', 'id' => $key],
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
