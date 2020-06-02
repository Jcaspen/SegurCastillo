<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SiniestrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Siniestros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siniestros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Siniestros', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'siniestro',
            'tomador_dni',
            'tipo_poliza',
            'capital_desenbolsado',
            //'observaciones',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
