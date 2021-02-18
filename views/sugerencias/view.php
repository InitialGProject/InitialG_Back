<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Sugerencias */

$this->title = $model->comentario;
\yii\web\YiiAsset::register($this);
?>

<div class="sugerencias-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if (Yii::$app->user->identity->TipoUser == 'Admin') {
            echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', '¿Seguro que quieres eliminar las sugerencias seleccionadas?'),
                    'method' => 'post',
                ],
            ]);
        } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'creador',
            'comentario:ntext',
        ],
    ]) ?>

</div>