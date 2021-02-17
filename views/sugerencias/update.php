<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */

$this->title = Yii::t('app', 'Update Sugerencias: {name}', [
    'name' => $model->id,
]);
?>

<div class="sugerencias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>