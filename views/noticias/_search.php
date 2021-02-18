<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- 
    $form->field($model, 'id')
    $form->field($model, 'autor_id')
    $form->field($model, 'entradas_id') 
    -->

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'autor') ?>

    <?php //$form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'texto') ?>

    <?php //$form->field($model, 'imagen') ?>

    <!-- CHtml::image(Yii::app()->request->baseUrl.'/banner/'.$model->image,"image",array("width"=>200)); -->

    <?php // echo $form->field($model, 'fecha') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
