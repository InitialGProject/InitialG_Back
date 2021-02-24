<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'edad')->textInput() ?>

    <?= 
    $form->field($model, 'password')->passwordInput(['maxlength' => true]);
    $form->field($model, 'token', ['options' => ['value'=> 'password'] ])->hiddenInput()->passwordInput()->label(false);     
    ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'suscripcion')->textInput() ?>

    <?= $form->field($model, 'avatar')->textarea(['rows' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>