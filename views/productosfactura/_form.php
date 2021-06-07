<?php

use kartik\datecontrol\DateControl;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductosFacturacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-facturacion-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= Html::activeHiddenInput($model, 'id_usuario'); ?>

        <?= Html::activeHiddenInput($model, 'fecha_compra'); ?>

        <?= 
            $form->field($model, 'enviado')
                ->dropdownList(
                    ['0' => 'No', '1' => 'Si'],
                    ['prompt' => 'Seleccionar']
                );
        ?>

        <?= $form->field($model, 'fecha_envio')->widget(DateControl::class, [
                'type' => DateControl::FORMAT_DATETIME
            ]) ?>
        
        <?= Html::activeHiddenInput($model, 'total'); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>
