<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductosfacturaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Facturacion');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-facturacion-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'label' => 'NºFactura',
                'value' => function ($data) {
                    return $data->id;
                }
            ],  
            'fecha_compra',
            [
                'attribute' => 'enviado',
                'label' => 'Enviado',
                'filter'=>['0'=>'No','1'=>'Si'],
                'value' => function ($data) {
                    return app\models\ProductosFacturacion::Activo( $data->enviado);
                }
            ],
            'fecha_envio',
            //'id_usuario',
            //'direccion',
            //'pais',
            //'cp',
            //'provincia',
            //'total',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update} '],
        ],
    ]); ?>


</div>
