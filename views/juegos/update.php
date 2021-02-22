<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */

$this->title = Yii::t('app', 'Update Juegos: {name}', [
    'name' => $model->titulo,
]);
?>

<div class="juegos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>