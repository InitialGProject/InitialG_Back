<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Noticias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticias-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- $form->field($model, 'autor_id')->textInput()
    $form->field($model, 'entradas_id')->textInput() -->

    <?= $form->field($model, 'titulo')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'texto')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'imagen')->textarea(['rows' => 1]) ?>

    <?php /*$form->field($model, 'fecha')->widget(DateControl::classname(), [
        'displayFormat' => 'php:d-M-Y H:i:s',
        'type' => DateControl::FORMAT_DATETIME
    ]); */?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>