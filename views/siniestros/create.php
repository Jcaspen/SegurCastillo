<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Siniestros */

$this->title = 'Create Siniestros';
$this->params['breadcrumbs'][] = ['label' => 'Siniestros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="siniestros-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
