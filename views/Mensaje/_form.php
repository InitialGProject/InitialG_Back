<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mensaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'chat_id')->textInput() ?>

    <?= $form->field($model, 'sender_id')->textInput() ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
