<?php

use app\models\Categorias;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?= $form->field($model, 'fechaInicio')->textInput() ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>

    <?= $form->field($model, 'entrada_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Crear'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>