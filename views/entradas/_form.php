<?php

/**
 * @author Juan Sanz
 */

// Modelos relacionados
use app\models\Categorias;
use app\models\Juegos;
use dosamigos\ckeditor\CKEditor;
// Helpers de YII
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

// Widgets y Extensiones
use yii\widgets\ActiveForm;
use kartik\datecontrol\DateControl;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?php
    echo $form->field($model, 'creado')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Juegos::find()->asArray()->all(), 'id', 'titulo');
    echo $form->field($model, 'juego_id')->dropDownList($options, ['prompt' => 'Seleccione un Juego']);
    ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?= $form->field($model, 'contenido')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?php
    if (Yii::$app->user->identity->TipoUser == 'Admin') {
        echo $form->field($model, 'estado')->dropdownList(
            [
                'A' => 'A',
                'D' => 'D'
            ],
            ['prompt' => 'Seleccione un Estado ( A = Aceptado - D = Denegado )']
        );
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>