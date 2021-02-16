<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */

$this->title = $model->titulo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Torneos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="torneos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        // Botón Actualizar
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || $model->creador == Yii::$app->user->identity->TipoUser || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>

        <?php
        // Botón Eliminar
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', '¿Seguro que quieres borrar este torneo?'),
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
            'fechaInicio',
            'fechaFin',
            'imagen',
            'Numparticipantes',
            'Estado',
            'Categoria',
            'creador',
        ],
    ]) ?>

</div>