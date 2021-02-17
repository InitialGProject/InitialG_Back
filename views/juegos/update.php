<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = Yii::t('app', 'Update Juegos: {name}', [
    'name' => $model->id,
]);
?>

<div class="juegos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>