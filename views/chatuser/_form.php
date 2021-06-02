<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ChatUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chat-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chat_id')->textInput() ?>
    <?= $form->field($model, 'user_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>