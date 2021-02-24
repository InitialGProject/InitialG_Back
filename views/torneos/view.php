<?php

/**
 * @author Juan Sanz
*/

// Helpers y Widgets de Yii
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Torneos */

$this->title = $model->titulo;
\yii\web\YiiAsset::register($this);
?>

<div class="torneos-view">
    <p>
        <?php
        // Botón Actualizar
        if (Yii::$app->user->isGuest) {
        } else if (Yii::$app->user->identity->TipoUser == 'Gamer' || $model->creador == Yii::$app->user->identity->TipoUser || Yii::$app->user->identity->TipoUser == 'Empresa' || Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
        } ?>

        <?php
        // Botón Eliminar
        if (Yii::$app->user->isGuest || $model->estado == 'C') {
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
            'fechaInicioTorneo',
            'fechaFinTorneo',
            [
                'attribute' => 'imagen del Torneo',
                'value' =>  Html::a(Html::img(Yii::$app->request->baseUrl . $model->imagen, ['alt' => 'imagen del torneo', 'class' => 'thing', 'height' => '100px', 'width' => '100px'])),
                'format' => ['raw'],
            ],
            'Numparticipantes',
            'Estado',
            'Categoria',
            'creador',
        ],
    ]) ?>

</div>