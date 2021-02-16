<?php

use app\models\Categorias;
use app\models\Entradas;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="entradas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'creado')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?= $form->field($model, 'contenido')->textarea(['rows' => 6]) ?>

    <?php
    if (Yii::$app->user->identity->TipoUser == 'Admin') {
        echo $form->field($model, 'estado')->dropdownList(
            [
                'A' => 'A',
                'D' => 'D'
            ],
            ['prompt' => 'Seleccione un Estado ( A = Aceptado - D = Denegado )']
        );
    } ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>