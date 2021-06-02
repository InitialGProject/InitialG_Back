<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChatUser */

$this->title = Yii::t('app', 'Update Chat User: {name}', [
    'name' => $model->user_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Chat Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="chat-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
