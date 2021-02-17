<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = Yii::t('app', 'Create Videos');
?>

<div class="videos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
