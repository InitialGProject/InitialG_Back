<?php

use yii\helpers\Html;
use yii\widgets\ListView;

$dataProvider->pagination = array('pageSize' => 2);

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>

<div class="entradas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'summary' => '',
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('_entrada', ['model' => $model]);
            //return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
        },
    ]) ?>

</div>