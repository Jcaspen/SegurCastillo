<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hogar';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>SEGURCASTILLO </h1>
<h2><?= Html::encode($this->title)?></h2>

<div class="jumbotron">
    <h6>Tomador: <?=$model->tomador_dni?></h6>
    <h6>Dirección: <?=$model->direccion?></h6>
    <h6>Población: <?=$model->poblacion?></h6>
    <h6>Provincia: <?=$model->provincia?></h6>
    <h6>Contenido: <?=$model->capital_asegurado?>€</h6>
    <h6>Prima Anual: <?=$model->prima?>€</h6>

</div>





<div class="jumbotron">
    <ul type=”A”>
      <li>Daños electricos</li>
      <li>Robo</li>
      <li>Incendio y otros daños</li>
      <li>Daños estéticos (1.500€)</li>
      <li>Defensa Jurídica</li>
      <li>Responsabilidad civil (150.000€)</li>
      <li>Garantías complementarias</li>
      <li>Roturas</li>
  </ul>
</div>
