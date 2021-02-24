<?php

/**
 * @author Marta Pretel
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

// AutoComplete
// use app\componentes\THtml;

// Modelos Relacionados
use app\models\Categorias;
use app\models\Usuarios;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Categorias::find()->asArray()->all(), 'id', 'categoria');
    echo $form->field($model, 'categoria_id')->dropDownList($options, ['prompt' => 'Seleccione una Categoria']);
    ?>

    <?php
    //Utilizamos asArray para que sea más óptimo el acceso, al devolver una lista de arrays
    $options = ArrayHelper::map(Usuarios::find()->asArray()->all(), 'id', 'nombre');
    echo $form->field($model, 'usuarios_id')->dropDownList($options, ['prompt' => 'Seleccione un Usuario']);
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Actualizar'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>