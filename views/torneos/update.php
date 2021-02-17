<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */

if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
    $this->title = Yii::t('app', 'Actualizar Torneo: {name}', [
        'name' => $model->titulo,
    ]);
?>

    <div class="torneos-update">

        <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_form', [
        'model' => $model,
    ]);
} ?>
    </div>