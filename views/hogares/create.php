<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hogares */

$this->title = 'Create Hogares';
$this->params['breadcrumbs'][] = ['label' => 'Hogares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hogares-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
