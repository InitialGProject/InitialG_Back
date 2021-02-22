<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = $model->titulo;
\yii\web\YiiAsset::register($this);
?>

<div class="entradas-view">
    <p>
        <?php
        // Botón Actualizar
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || $model->creador == Yii::$app->user->identity->TipoUser || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id,], ['class' => 'btn btn-primary']);
        } ?>

        <?php
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || $model->creador == Yii::$app->user->identity->TipoUser || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ]
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'contenido:ntext',
            'fechaPublicacion',
            'JuegoRelacionado',
            'Categoria',
            'creador',
            'Estado',
        ],
    ]) ?>

</div>