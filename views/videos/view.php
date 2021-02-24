<?php

/**
 * @author Marta Pretel
*/

// Helpers y widgets de Yii
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Videos */

$this->title = $model->titulo;
\yii\web\YiiAsset::register($this);
?>

<div class="videos-view">

    <p>
        <?php
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>
        <?php
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', '¿Seguro que quieres borrar este vídeo?'),
                    'method' => 'post',
                ],
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'descripcion:ntext',
            'video:ntext',
            'CategoriaNombre',
            'Creador',
        ],
    ]) ?>

</div>