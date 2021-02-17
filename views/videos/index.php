<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Videos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="videos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    if (Yii::$app->user->isGuest) {        
        echo("No tienes acceso a este sitio");
    } else { 
        if (Yii::$app->user->identity->TipoUser == 'Admin'){?>
       
       <p>
        <?= Html::a(Yii::t('app', 'Create Videos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute'=>'categorias_id',
                'label'=>'Categorias',
                'filter'=>app\models\Categorias::lookup(),
                'value'=>function($data) {
                    return $data->categoria->categoria;
                    }
            ],
            'video:ntext',
            'descripcion:ntext',
            'titulo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php } else{
        echo("No tienes acceso a este sitio");
    }

} ?>


</div>
