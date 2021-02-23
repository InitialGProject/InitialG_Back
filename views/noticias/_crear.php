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

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 1]) ?>

    <?php
    echo $form->field($model, 'fecha')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'texto')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <!-- subida imagen------------------------------------------------------------------>
    <?= $form->field($model, 'imagen')->fileInput() ?>
    <!---------------------------------------------------------------------------------->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Crear'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>