<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'No Vida';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>SEGURCASTILLO </h1>
<h2><?= Html::encode($this->title)?></h2>

<div class="jumbotron">
    <h6>Tomador: <?=$model->tomador_dni?></h6>
    <h6>Tipo de Póliza: <?=$model->tipo_poliza?></h6>
    <h6>Riesgo: <?=$model->riesgo?></h6>
    <h6>Capital Asegurado: <?=$model->capital_asegurado?></h6>
    <h6>Prima Anual: <?=$model->prima?>€</h6>
    <h6>Prima Semestral: <?=$model->prima/2?>€</h6>

</div>





<div class="jumbotron">
    <ul type=”A”>
      <li>Perdida</li>
      <li>Robo</li>
      <li>Incendio</li>
      <li>Riesgos extraordinarios</li>
      <li>Fenómenos atmosféricos</li>
      <li>Responsabilidad civil (300.000€)</li>
      <li>Asistencia en viaje</li>
  </ul>
</div>
