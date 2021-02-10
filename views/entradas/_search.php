<?php

use app\models\Categorias;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EntradasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'titulo') ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?php // echo $form->field($model, 'usuarios_id') 
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Cancelar'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>