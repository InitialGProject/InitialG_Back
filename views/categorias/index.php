<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Categorias');
?>

<div class="categorias-index">

    <p>
        <?= Html::a(Yii::t('app', 'Create Categorias'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'categoria',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>