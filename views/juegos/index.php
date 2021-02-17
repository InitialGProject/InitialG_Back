<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Juegos');
?>

<div class="juegos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel])
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') { ?>

            <p>

                <?= Html::a(Yii::t('app', 'Create Juegos'), ['create'], ['class' => 'btn btn-success']) ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => '',
                    'columns' => [
                        //['class' => 'yii\grid\SerialColumn'],
                        'titulo:ntext',
                        'descipcion:ntext',
                        'imagen:ntext',
                        [
                            'attribute' => 'categorias_id',
                            'label' => 'Categorias',
                            'filter' => app\models\Categorias::lookup(),
                            'value' => function ($data) {
                                return $data->categoria->categoria;
                            }
                        ],
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>

            </p>

    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>






</div>