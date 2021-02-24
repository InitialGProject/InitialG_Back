<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Extensiones
use kartik\datecontrol\DateControl;

// Modelos Relacionados
use app\models\Categorias;

/* @var $this yii\web\View */
/* @var $model app\models\TorneosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-9 col-12">
            <?= $form->field($model, 'titulo') ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-12">
            <?php
            //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
            $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
            echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
            ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <?= $form->field($model, 'fechaInicio')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATETIME
            ]); ?>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
            <?= $form->field($model, 'fechaFin')->widget(DateControl::classname(), [
                'type' => DateControl::FORMAT_DATETIME
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>