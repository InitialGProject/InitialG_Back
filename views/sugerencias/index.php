<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sugerencias');
?>

<div class="sugerencias-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
    ?>

            <p>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemOptions' => ['class' => 'item'],
                    'summary' => '',
                    'itemView' => function ($model, $key, $index, $widget) {
                        // return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
                        return $this->render('_sugerencias', ['model' => $model]);
                    },
                ]) ?>
            </p>

    <?php } else {
            echo Html::a(Yii::t('app', 'Hacer Sugerencia'), ['create'], ['class' => 'btn btn-success']);
        }
    } ?>
</div>