<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = Yii::t('app', 'Crear Entrada');
?>

<div class="entradas-create">

    <?= $this->render('_crear', [
        'model' => $model,
    ]) ?>

</div>