<?php

use app\models\Categorias;
use app\models\Entradas;
use app\models\Participantestorneos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?= $form->field($model, 'fechaInicio')->textInput() ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>

    <?= $form->field($model, 'imagen')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?= $form->field($model, 'Creador')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    if (Yii::$app->user->identity->TipoUser == 'Admin') {
        $options = ArrayHelper::map(Entradas::find()->asArray()->all(), 'id', 'estado');
        echo $form->field($model, 'entrada_id')->dropDownList($options, ['prompt' => 'Seleccione un Estado ( A = Aceptado - D = Denegado )']);
    }
    ?>

    <?php
    if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
        echo $form->field($model, 'estado')->dropdownList(
            [
                'C' => 'C',
                'F' => 'F'
            ],
            ['prompt' => 'Seleccione un Estado ( C = En Curso - F = Finalizado )']
        );
    }
    ?>

    <?php
    if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
        $options = ArrayHelper::map(Participantestorneos::find()->asArray()->all(), 'id', 'numeroParticipantes');
        echo $form->field($model, 'participantes_id')->dropDownList($options);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>