<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vida';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>SEGURCASTILLO </h1>
<h2><?= Html::encode($this->title)?></h2>

<div class="jumbotron">
    <h6>Tomador: <?=$model->tomador_dni?></h6>
    <h6>Tipo de Póliza: <?=$model->tipo_poliza?></h6>
    <h6>Capital: <?=$model->capital?>€</h6>
    <h6>Prima Anual: <?=$model->prima?>€</h6>

</div>





<div class="jumbotron">
    <ul type=”A”>
      <li>Asistencia Familiar</li>
      <li>Asistencia Urgente</li>
      <li>Responsabilidad civil (300.000€)</li>
      <li>Seguro Dental</li>
      <li>Garantías complementarias</li>
  </ul>
</div>
