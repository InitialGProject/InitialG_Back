<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Categorias;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'descipcion')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'imagen')->textarea(['rows' => 1]) ?>

    <?php $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria'); ?>
    <?=$form->field($model, 'categoria_id')->dropDownList($options, ['prompt' => 'Seleccionar']); ?>

    
    <?=  $form->field($model, 'tipo')->dropdownList(
            ['AC' => 'AC', 'RE' => 'RE'],
            ['prompt' => 'Seleccionar']
        ); 
    ?>

    <?= $form->field($model, 'ruta')->textarea(['rows' => 1]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
