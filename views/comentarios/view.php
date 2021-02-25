<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Comentarios */

$this->title = $model->EntradaRelacionada;
\yii\web\YiiAsset::register($this);
?>

<div class="comentarios-view">

    <p>
        <?php
        if (
            Yii::$app->user->identity->TipoUser == 'Gamer' ||
            Yii::$app->user->identity->TipoUser == 'Empresa' ||
            Yii::$app->user->identity->TipoUser == 'Admin'
        ) {
            echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>
        <?php
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', '¿Seguro que quieres eliminar este comentario?'),
                    'method' => 'post',
                ],
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'contenido:ntext',
            'fechaPublicacion',
            'autor',
            'Estado',
        ],
    ]) ?>

</div>