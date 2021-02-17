<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$dataProvider->pagination = array('pageSize' => 2);

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'),  'url' => ['/entradas/index']];
?>
<div class="entradas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel])
    if (Yii::$app->user->isGuest) {        
        echo("No tienes acceso a este sitio");
    } else { 
        if (Yii::$app->user->identity->TipoUser == 'Admin'){?>
       
       <p>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_entrada', ['model' => $model]);
            //return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>

    </p>

    <?php } else{
        echo("No tienes acceso a este sitio");
    }

} ?>

</div>