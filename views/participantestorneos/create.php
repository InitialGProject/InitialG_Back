<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Participantestorneos */

$this->title = Yii::t('app', 'Create Participantestorneos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Participantestorneos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="participantestorneos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
