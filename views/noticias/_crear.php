<?php

/**
 * @author Dan Nedelea
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

// Extensiones añadidas (Control de Fecha - Editor de Texto)
use kartik\datecontrol\DateControl;
use dosamigos\ckeditor\CKEditor;

// AutoComplete
use app\componentes\THtml;

// Modelos Relacionados
use app\models\Entradas;

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
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <!---------------------------------------------------------------------------------->

    <?= THtml::autocomplete($model, 'autor_id', ['/usuarios/lookup'], 'id'); ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Entradas::find()->asArray()->all(), 'id', 'titulo');
    echo $form->field($model, 'entradas_id')->dropDownList($options, ['prompt' => 'Seleccione una Entrada del Foro']);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Crear'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>