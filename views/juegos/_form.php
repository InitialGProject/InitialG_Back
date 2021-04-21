<?php

/**
 * @author Alejandro Lopez
*/

// Helpers y widgets de Yii

use app\componentes\THtml;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

///completar
// use app\componentes\THtml;

// Modelos Relacionados
use app\models\Categorias;
use app\models\Juegos;

// Modelo de subir archivos (en este caso imágenes)
use app\models\UploadForm;

/* @var $this yii\web\View */
/* @var $model app\models\Juegos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="juegos-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'titulo')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'descipcion')->textarea(['rows' => 2]) ?>

    <!-- <?= $form->field($model, 'imagen')->textarea(['rows' => 1]) ?> -->

    <?php $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria'); ?>
    <?= $form->field($model, 'categoria_id')->dropDownList($options, ['prompt' => 'Seleccionar']); ?>

    <?= $form->field($model, 'tipo')->dropdownList(
        ['AC' => 'AC', 'RE' => 'RE'],
        ['prompt' => 'Seleccionar']
    );
    ?>

    <?= $form->field($model, 'ruta')->textarea(['rows' => 1]) ?>

    <!-- auto complete------------------------------------------------------------------>
    <?= THtml::autocomplete($model, 'creador', ['/juegos/lookup'], 'creador'); ?>
    <!---------------------------------------------------------------------------------->

    <!-- subida imagen------------------------------------------------------------------>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <!---------------------------------------------------------------------------------->

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Guardar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>