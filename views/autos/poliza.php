<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autos';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>SEGURCASTILLO </h1>
<h2><?= Html::encode($this->title)?></h2>

<div class="jumbotron">
    <h6>Tomador: <?=$model->tomador_dni?></h6>
    <h6>matricula: <?=$model->matricula?></h6>
    <h6>Marca: <?=$model->marca?></h6>
    <h6>Modelo: <?=$model->modelo?></h6>
    <h6>Prima Anual: <?=$model->prima?>€</h6>

</div>





<div class="jumbotron">
    <ul type=”A”>
      <li>Daños por agua</li>
      <li>Robo</li>
      <li>Incendio</li>
      <li>Lunas</li>
      <li>Fenómenos atmosféricos</li>
      <li>Responsabilidad civil (300.000€)</li>
      <li>Asistencia en viaje</li>
      <li>Vehículo de sustitución</li>
  </ul>
</div>
