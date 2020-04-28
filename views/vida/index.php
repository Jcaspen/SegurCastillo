<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Vida', ['create'], ['class' => 'btn btn-success']) ?>
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
            'ocupacion',
            'ingresos_anuales',
            //'tipo_poliza',
            //'ingreso_mensual',
            //'capital',
            //'cuestionario',
            //'prima',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
