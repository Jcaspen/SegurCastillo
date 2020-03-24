<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles y Permisos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Rol o Permiso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'type',
            //'created_at',
            //'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   'update' => function ($url, $model, $key) {
                       return Html::a(
                           'Modificar',
                           ['auth-item/update', 'id' => $key],
                       );
                   },
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['auth-item/delete', 'id' => $key],
                           [
                               'data-method' => 'POST',
                               'data-confirm' => '¿Seguro que desea eliminar el permiso?',
                           ]
                       );
                   },
               ],
           ],
        ],
    ]); ?>


</div>
