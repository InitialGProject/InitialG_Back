<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Participantestorneos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="participantestorneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'torneos_id')->textInput() ?>

    <?= $form->field($model, 'usuario_id')->textInput() ?>

    <?= $form->field($model, 'numeroParticipantes')->textInput() ?>

    <?= $form->field($model, 'premioTorneo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
