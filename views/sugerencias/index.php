<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    
                    'creador',
                    'comentario:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

    <?php } else {
            echo Html::a(Yii::t('app', 'Hacer Sugerencia'), ['create'], ['class' => 'btn btn-success']);
        }
    } ?>

</div>