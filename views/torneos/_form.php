<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// Extensiones
use kartik\datecontrol\DateControl;

// Modelos Relacionados
use app\models\Categorias;
use app\models\Entradas;
use app\models\Participantestorneos;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="torneos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput() ?>

    <?php
    echo $form->field($model, 'fechaInicio')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);

    echo $form->field($model, 'fechaFin')->widget(DateControl::classname(), [
        'type' => DateControl::FORMAT_DATETIME
    ]);
    ?>

    <?= $form->field($model, 'imagen')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categorias_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?= $form->field($model, 'Creador')->textInput() ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays 
    if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
        $options = ArrayHelper::map(Entradas::find()->asArray()->all(), 'id', 'titulo');
        echo $form->field($model, 'entrada_id')->dropDownList($options, ['prompt' => 'Seleccione una Entrada']);
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