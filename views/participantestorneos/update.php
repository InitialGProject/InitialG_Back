<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Participantestorneos */

$this->title = Yii::t('app', 'Update Participantestorneos: {name}', [
    'name' => $model->id,
]);
?>

<div class="participantestorneos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>