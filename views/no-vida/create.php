<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NoVida */

$this->title = 'Create No Vida';
$this->params['breadcrumbs'][] = ['label' => 'No Vidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-vida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
