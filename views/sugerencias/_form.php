<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sugerencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'autor_id')->textInput() ?>

    <?= $form->field($model, 'comentario')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
