<?php

/**
 * @author Marta Pretel
*/

// Helpers y vistas de Yii
use yii\helpers\Html;
use yii\grid\GridView;

// CheckBox de Acción Múltiple
use kartik\grid\CheckboxColumn;

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
                <?= Html::a(Yii::t('app', 'Crear Videos'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'summary' => '',
                'columns' => [
                    'titulo',
                    'video:ntext',
                    'descripcion:ntext',
                    [
                        'attribute' => 'categoria_id',
                        'label' => 'Categorias',
                        'filter' => app\models\Categorias::lookup(),
                        'value' => function ($data) {
                            return $data->categoria->categoria;
                        },
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                    // [
                    //     'class' => CheckboxColumn::className(), 'name' => 'idselec',
                    //     'checkboxOptions' => function ($model, $key, $index, $column) {
                    //         return ['value' => $model->id];
                    //     }
                    // ],
                ],
            ]); ?>
            </p>
    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>
</div>