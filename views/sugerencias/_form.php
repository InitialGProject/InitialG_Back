<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use app\componentes\THtml;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sugerencias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= THtml::autocomplete($model, 'autor_id', ['/usuarios/lookup'], 'autor'); ?>

    <?= $form->field($model, 'comentario')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Hacer Sugerencia'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>