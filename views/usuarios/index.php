<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\ActionColumn;
use yii\grid\DataColumn;
use yii\grid\SerialColumn;
use yii\web\View;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'login',
            'rol',
            [
               'class' => 'yii\grid\ActionColumn',
               'header' => 'Acciones',
               'buttons' => [
                   
                   'delete' => function ($url, $model, $key) {
                       return Html::a(
                           'Eliminar',
                           ['usuarios/delete', 'id' => $key],
                           [
                               'data-method' => 'POST',
                               'data-confirm' => '¿Seguro que desea eliminar el Usuario?',
                           ]
                       );
                   },
               ],
           ],
        ],
    ]); ?>

</div>
