<?php

/**
 * @author Marta Pretel
 */

// Helpers y vistas de Yii
use yii\helpers\Html;
use yii\grid\GridView;

// CheckBox de Acción Múltiple
use yii\grid\CheckboxColumn as GridCheckboxColumn;

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

            <?= Html::beginForm(['videos/borrar'], 'post'); ?>
            
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

                    [
                        'class' => GridCheckboxColumn::className(), 'name' => 'idselec',
                        'checkboxOptions' => function ($model, $key, $index, $column) {
                            return ['value' => $model->id];
                        }
                    ],

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

            <?= Html::submitButton('Borrar Seleccionado', ['class' => 'btn btn-danger',]); ?>
            <?= Html::endForm(); ?>
            </p>
    <?php } else {
            echo ("No tienes acceso a este sitio");
        }
    } ?>
</div>