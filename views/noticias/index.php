<?php

use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticiasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Noticias');
?>

<div class="noticias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        // Botón Crear
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Crear Noticia'), ['/noticias/create'], ['class' => 'btn btn-success']);
        } ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'summary' => '',
        'itemView' => function ($model, $key, $index, $widget) {
            // return Html::a(Html::encode($model->titulo), ['view', 'titulo' => $model->titulo]);
            return $this->render('_noticia', ['model' => $model]);
        },
    ]) ?>


</div>