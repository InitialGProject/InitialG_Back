<?php

// Helpers y widgets de Yii

use app\componentes\THtml;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

///completar
// use app\componentes\THtml;

// Modelos Relacionados
use app\models\ProductosCategoria;

// Modelo de subir archivos (en este caso imágenes)
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php $options = ArrayHelper::map(ProductosCategoria::find()->asArray()->all(), 'id', 'nombre'); ?>
    <?= $form->field($model, 'cat_id')->dropDownList($options, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true, 'min'=>'0']) ?>

    <?= $form->field($model, 'IVA')->textInput() ?>

    <!-- subida imagen------------------------------------------------------------------>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <!---------------------------------------------------------------------------------->

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'disponible')->dropdownList(
        ['0' => 'No', '1' => 'Si'],
        ['prompt' => 'Seleccionar']
    );
    ?>

    <?= $form->field($model, 'estado')->dropdownList(
        ['0' => 'Normal', '1' => 'Nuevo', '2' => 'Oferta'],
        ['prompt' => 'Seleccionar']
    );
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar Cambios'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
