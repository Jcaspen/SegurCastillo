<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoVidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'No Vidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-vida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create No Vida', ['create'], ['class' => 'btn btn-success']) ?>
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
            'riesgo',
            'integrantes',
            //'tipo_poliza',
            //'capital_asegurado',
            //'prima',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
