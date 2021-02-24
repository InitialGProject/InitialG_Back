<?php

/**
 * @author Dan Nedelea
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NoticiasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$dataProvider->pagination = array('pageSize' => 2);

$this->title = Yii::t('app', 'Noticias');
?>

<div class="noticias-index">

    <p>
        <?php
        // Botón Crear
        if (Yii::$app->user->isGuest) {
            echo ("No tienes acceso a este sitio");
        } else {
            if (
                // Yii::$app->user->identity->TipoUser == 'Gamer' ||
                Yii::$app->user->identity->TipoUser == 'Empresa' ||
                Yii::$app->user->identity->TipoUser == 'Admin'
            ) {
                echo Html::a(Yii::t('app', 'Crear noticia'), ['/noticias/create'], ['class' => 'btn btn-success']);
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

<?php } ?>
</div>