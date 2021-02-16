<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */

if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
    $this->title = Yii::t('app', 'Crear nuevo Torneo');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Torneos'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>

    <div class="torneos-create">

        <h1><?= Html::encode($this->title) ?></h1>

    <?php
    echo $this->render('_crear', [
        'model' => $model,
    ]);
}
    ?>
    </div>