<?php

/**
 * @author Dan Nedelea
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UseruserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Amigos');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="useruser-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } else {
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            $dataProvider->pagination = array('pageSize' => 10); ?>

            <p>
                <?= Html::a(Yii::t('app', 'Agregar amigo'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    // [
                    //     // 'attribute' => 'added_user',
                    //     // 'label' => 'Amigo',
                    //     'format' => ['image', ['width' => '30', 'height' => '30']],
                    //     'value' => function ($data) {
                    //         return ('http://alum3.iesfsl.org/assets/img/perfiles/' . $data->user->avatar);
                    //     }
                    // ],
                    // [
                    //     'attribute' => 'user_id',
                    //     'label' => 'Yo',
                    //     'filter' => app\models\Usuarios::lookup(),
                    //     'value' => function ($data) {
                    //         return $data->user->nombre;
                    //     }
                    // ],
                    [
                        // 'attribute' => 'user_id',
                        'label' => 'ID Usuario',
                        // 'filter' => app\models\Usuarios::lookup(),
                        'value' => function ($data) {
                            return $data->user->id;
                        }
                    ],
                    [
                        // 'attribute' => 'added_user',
                        // 'label' => 'Amigo',
                        'format' => ['image', ['width' => '30', 'height' => '30']],
                        'value' => function ($data) {
                            return ('http://alum3.iesfsl.org/assets/img/perfiles/' . $data->user->avatar);
                        }
                    ],
                    [
                        'attribute' => 'user_id',
                        'label' => 'Usuario',
                        'filter' => app\models\Usuarios::lookup(),
                        'value' => function ($data) {
                            return $data->user->nombre;
                        }
                    ],

                    [
                        // 'attribute' => 'added_user',
                        'label' => 'ID Amigo',
                        // 'filter' => app\models\Usuarios::lookup(),
                        'value' => function ($data) {
                            return $data->addedUser->id;
                        }
                    ],
                    [
                        // 'attribute' => 'added_user',
                        // 'label' => 'Amigo',
                        'format' => ['image', ['width' => '30', 'height' => '30']],
                        'value' => function ($data) {
                            return ('http://alum3.iesfsl.org/assets/img/perfiles/' . $data->addedUser->avatar);
                        }
                    ],
                    [
                        'attribute' => 'added_user',
                        'label' => 'Amigo',
                        'filter' => app\models\Usuarios::lookup(),
                        'value' => function ($data) {
                            return $data->addedUser->nombre;
                        }
                    ],
                    ['class' => 'yii\grid\ActionColumn'],

                ],

            ]); ?>
    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>
</div>