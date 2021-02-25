<?php

/**
 * @author Juan Sanz
 */

// Helpers y Widgets de Yii
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Extensiones
use kartik\datecontrol\DateControl;

// AutoCompletar
use app\componentes\THtml;
use app\models\Entradas;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\ComentariosSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comentarios-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php $options = ArrayHelper::map(Entradas::find()->asArray()->all(), 'id', 'titulo'); ?>
    <?= $form->field($model, 'entradas_id')->dropDownList($options, ['prompt' => 'Seleccionar Entrada']); ?>

    <?= THtml::autocomplete($model, 'usuario_id', ['/usuarios/lookup'], 'usuario_id'); ?>

    <?= $form->field($model, 'creado')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]); ?>

    <?= $form->field($model, 'contenido') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>