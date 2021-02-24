<?php

use app\componentes\THtml;
use app\models\Categorias;
use app\models\Entradas;
use kartik\datecontrol\DateControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlenght' => true]) ?>

    <?php
    echo $form->field($model, 'fechaInicio')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    
    echo $form->field($model, 'fechaFin')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>

    <?= $form->field($model, 'imagen')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Entradas::find()->asArray()->all(), 'id', 'titulo');
    echo $form->field($model, 'entrada_id')->dropDownList($options, ['prompt' => 'Seleccione una Entrada']);
    ?>

    <?= THtml::autocomplete($model, 'usuario_id', ['/usuarios/lookup'], 'usuario'); ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Crear'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>