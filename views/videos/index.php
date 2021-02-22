<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Videos');
?>

<div class="videos-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') { ?>

            <p>
                <?= Html::a(Yii::t('app', 'Create Videos'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    [
                        'attribute' => 'categoria_id',
                        'label' => 'Categorias',
                        'filter' => app\models\Categorias::lookup(),
                        'value' => function ($data) {
                            return $data->categoria->categoria;
                        }
                    ],
                    'video:ntext',
                    'descripcion:ntext',
                    'titulo',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
            </p>
    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>
</div>