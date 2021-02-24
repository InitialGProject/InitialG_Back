<?php

use yii\helpers\Html;
use yii\grid\CheckboxColumn as GridCheckboxColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sugerencias');
?>

<div class="sugerencias-index">

    <?php
    if (Yii::$app->user->isGuest) {
        echo ("No tienes acceso a este sitio");
    } elseif (Yii::$app->user->identity->TipoUser == 'Admin') {
        echo Html::beginForm(['sugerencias/borrar'], 'post');
        echo Html::dropDownList('comentario', '', ['' => 'Marcar selecc. como: ', 'A' => 'Dan', 'R' => 'Juan'], ['class' => 'dropdown',]);
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'columns' => [

                'creador',
                'comentario:ntext',

                [
                    'class' => GridCheckboxColumn::className(), 'name' => 'idselec',
                    'checkboxOptions' => function ($model, $key, $index, $column) {
                        return ['value' => $model->id];
                    }
                ],
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
        echo Html::submitButton('Enviar', ['class' => 'btn btn-danger',]);


        echo Html::endForm();
    } else {
        echo Html::a(Yii::t('app', 'Hacer Sugerencia'), ['create'], ['class' => 'btn btn-success']);
    } ?>

</div>