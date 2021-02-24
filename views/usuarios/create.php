<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = Yii::t('app', 'Create Usuarios');
?>

<div class="usuarios-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>