<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\Html;
use yii\widgets\ListView;

$dataProvider->pagination = array('pageSize' => 2);

/* @var $this yii\web\View */
/* @var $searchModel app\models\TorneosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Torneos');
?>

<div class="torneos-index">

    <p>
        <?php
        // Botón Crear
        if (Yii::$app->user->isGuest) {
            echo ("No tienes acceso a este sitio");
        } else {
            if (
                Yii::$app->user->identity->TipoUser == 'Gamer' ||
                Yii::$app->user->identity->TipoUser == 'Empresa' ||
                Yii::$app->user->identity->TipoUser == 'Admin'
            ) {
                echo Html::a(Yii::t('app', 'Crear nuevo Torneo'), ['/torneos/create'], ['class' => 'btn btn-success']);
            } ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'summary' => '',
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_torneo', ['model' => $model]);
                    // return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
                },
            ]) ?>
<?php } ?>
</div>