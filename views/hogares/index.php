<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'poliza',
            'tomador_dni',
            'direccion',
            'poblacion',
            //'provincia',
            //'cp',
            //'viviendas',
            //'metros_cuadrados',
            //'capital_asegurado',
            //'prima',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
