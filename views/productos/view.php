<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = $model->nombre;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-view">

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar'), ['delete', 'id' => $model->id], [
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
            [
                'label' => '',
                'format' => ['image', ['width' => '200', 'height' => '200']],
                'value' => function ($data) {
                    return ('http://alum3.iesfsl.org/assets/img/tienda/' . $data->imagen);
                }
            ],
            [
                'attribute' => 'cat_id',
                'label' => 'Categoria',
                'value' => function ($data) {
                    return $data->cat->nombre;
                }
            ],
            'nombre:ntext',
            [
                'attribute' => 'precio',
                'label' => 'Precio',
                'value' => function ($data) {
                    return $data->precio."€";
                }
            ],
            [
                'attribute' => 'IVA',
                'label' => 'IVA',
                'value' => function ($data) {
                    return $data->IVA."%";
                }
            ],
            'imagen:ntext',
            'descripcion:ntext',
            'stock',
            [
                'attribute' => 'disponible',
                'label' => 'Disponible',
                'value' => function ($data) {
                    return app\models\Productos::Activo( $data->disponible);
                }
            ],
            [
                'attribute' => 'estado',
                'label' => 'Estado',
                'value' => function ($data) {
                    return app\models\Productos::Estado( $data->estado);
                }
            ],
        ],
    ]) ?>

</div>
