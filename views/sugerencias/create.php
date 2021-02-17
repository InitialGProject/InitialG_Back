<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */

$this->title = Yii::t('app', 'Create Sugerencias');
?>

<div class="sugerencias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>