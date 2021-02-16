<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['/entradas/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="entradas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (Yii::$app->user->isGuest) {
        } else { ?>
        <?= Html::a(Yii::t('app', 'Actualizar'), [
                'update', 'id' => $model->id,
                'usuarios_nombre' => $model->usuario->nombre,
                'fecha_hora' => $model->creado
            ], ['class' => 'btn btn-primary']);
        } ?>

        <?php
        if (Yii::$app->user->isGuest) {
        } else { ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'titulo',
            'contenido:ntext',
            'creado',
            'JuegoRelacionado',
            'Categoria',
            'creador',
            'Estado',
        ],
    ]) ?>

</div>