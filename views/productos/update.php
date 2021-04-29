<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = Yii::t('app', 'Actualizar: {name}', [
    'name' => $model->nombre,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="productos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
