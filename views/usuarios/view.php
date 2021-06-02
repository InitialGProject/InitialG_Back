<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */

$this->title = $model->nombre;
\yii\web\YiiAsset::register($this);
?>

<div class="usuarios-view">

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nombre',
            'correo:ntext',
            'edad',
            'genero',
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'value' => function ($data) {
                    return $data->Estado;
                }
            ],
            [
                'attribute' => 'suscripcion',
                'label' => 'Suscripcion',
                'value' => function ($data) {
                    switch($data->suscripcion){
                        case 1:
                            return "Registrado";
                            break;
                        case 2:
                            return "Gamer";
                            break;
                        case 3:
                            return "Empresa";
                            break;
                        case 5:
                            return "Administrador";
                            break;

                    }
                    return $data->suscripcion;
                },
            ],            'avatar:ntext',
        ],
    ]) ?>

</div>