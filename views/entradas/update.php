<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = Yii::t('app', 'Actualizar: {name}', [
    'name' => $model->titulo
]);
?>

<div class="entradas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>