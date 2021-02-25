<?php

/**
 * @author Juan Sanz
 */

// Helpers y Widgets de Yii
use yii\helpers\Html;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComentariosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Comentarios');
?>

<div class="comentarios-index">

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
                echo Html::a(Yii::t('app', 'Hacer Comentario'), ['create'], ['class' => 'btn btn-success']);
            }   ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemOptions' => ['class' => 'item'],
                'summary' => '',
                'itemView' => function ($model, $key, $index, $widget) {
                    return $this->render('_comentarios', ['model' => $model]);
                    // return Html::a(Html::encode($model->id), ['view', 'id' => $model->id]);
                },
            ]) ?>
<?php } ?>
</div>