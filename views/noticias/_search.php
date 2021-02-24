<?php

/**
 * @author Dan Nedelea
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\widgets\ActiveForm;

// AutoComplete
use app\componentes\THtml;

/* @var $this yii\web\View */
/* @var $model app\models\NoticiasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="noticias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-lg-5 col-md-5 col-sm-5 col-12">
            <?= $form->field($model, 'titulo') ?>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-5 col-12">
            <?= THtml::autocomplete($model, 'autor_id', ['/usuarios/lookup'], 'autor_id'); ?>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-2 col-12" style="margin-top: 2.5rem">
            <div class="form-group" style="bottom: 0">
                <?= Html::submitButton(Yii::t('app', 'Buscar'), ['class' => 'btn btn-primary']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>