<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Usuarios');
?>

<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel])
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') { ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Usuarios'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'summary' => '',
                'columns' => [
                    'nombre',
                    'correo:ntext',
                    //'edad',
                    'password',
                    //'tipo',
                    //'genero',
                    'estado',
                    'suscripcion',
                    //'avatar:ntext',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            </p>

    <?php
        } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>


</div>