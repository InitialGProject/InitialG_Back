<?php

/**
 * @author Alejandro Lopez
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

///completar
use app\componentes\THtml;

// Modelos Relacionados
use app\models\Categorias;

// Modelo de subir archivos (en este caso imágenes)
use app\models\UploadForm;

//text editor
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Juegos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 1]) ?>
    
    <!--CKeditor------------------------------------------------------------------------->
    <?= $form->field($model, 'descipcion')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <!---------------------------------------------------------------------------------->

    <!-- <?= $form->field($model, 'imagen')->textarea(['rows' => 1]) ?> -->

    <?php $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria'); ?>
    <?= $form->field($model, 'categoria_id')->dropDownList($options, ['prompt' => 'Seleccionar Categoria']); ?>

    <?= $form->field($model, 'tipo')->dropdownList(
        ['AC' => 'AC', 'RE' => 'RE'],
        ['prompt' => 'Seleccionar']
    );
    ?>

    <?= $form->field($model, 'ruta')->textarea(['rows' => 1]) ?>

    <!--Autocom------------------------------------------------------------------------->
    <?= THtml::autocomplete($model, 'creador', ['/juegos/lookup'], 'id'); ?>
    <!---------------------------------------------------------------------------------->

    <!-- subida imagen------------------------------------------------------------------>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <!---------------------------------------------------------------------------------->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>