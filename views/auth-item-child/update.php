<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AuthItemChild */

$this->title = 'Modificar permisos de ' . $model->parent;
$this->params['breadcrumbs'][] = ['label' => 'Permisos asignados', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="auth-item-child-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formup', [
        'model' => $model,
    ]) ?>

</div>
