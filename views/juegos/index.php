<?php

/**
 * @author Alejandro Lopez
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JuegosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Juegos');
?>

<div class="juegos-index">


    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            $dataProvider->pagination = array('pageSize' => 5); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Crear Juego'), ['create'], ['class' => 'btn btn-success']) ?>

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'summary' => '',
                    'columns' => [
                        //'categoria_id:ntext',
                        [
                            'attribute' => 'categoria_id',
                            'label' => 'Categorias',
                            'filter' => app\models\Categorias::lookup(),
                            'value' => function ($data) {
                                return $data->categoria->categoria;
                            }
                        ],
                        'titulo:ntext',
                        'descipcion:ntext',
                        [
                            'attribute' => 'tipo',
                            'label' => 'Tipo',
                            'filter' => app\models\Juegos::lookup(),
                            'value' => function ($data) {
                                return $data->tipo;
                            }
                        ],
                        // 'tipo:ntext',
                        [
                            'label' => 'Imagen',
                            'format' => ['image', ['width' => '100', 'height' => '100']],
                            'value' => function ($data) {
                                return ('http://alum3.iesfsl.org/assets/img/juegos/' . $data->imagen);
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