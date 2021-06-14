<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\SqlDataProvider;
use yii\db\Query;

//Extraer las lineas de la factura
$query = new Query;
$query->select('id_producto, cantidad')
    ->from('productos_factura')
    ->where(['id_facturacion' => $model->id]);
$command = $query->createCommand();
// $command->sql returns the actual SQL
$filas = $command->queryAll();


/* @var $this yii\web\View */
/* @var $model app\models\ProductosFacturacion */

$this->title = "Factura Nº".$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos Facturacions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="productos-facturacion-view">

    <p>
        <?= Html::a(Yii::t('app', 'Actualizar pedido'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Borrar pedido'), ['delete', 'id' => $model->id], [
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
                'attribute' => 'id',
                'label' => 'NºFactura',
                'value' => function ($data) {
                    return $data->id;
                }
            ], 
            [
                'attribute' => 'id_usuario',
                'label' => 'Comprador',
                'value' => function ($data) {
                    return $data->usuario->nombre;
                }
            ],
            'fecha_compra',
            'direccion',
            'pais',
            'cp',
            'provincia',
            [
                'attribute' => 'enviado',
                'label' => 'Enviado',
                'value' => function ($data) {
                    return app\models\ProductosFacturacion::Activo( $data->enviado);
                }
            ],
            'fecha_envio',
            [
                'attribute' => 'total_si',
                'label' => 'Total:',
                'value' => function ($data) {
                    return $data->total_si."€";
                }
            ],
            [
                'attribute' => 'total',
                'label' => 'Total con IVA:',
                'value' => function ($data) {
                    return $data->total."€";
                }
            ], 
            [
                'label' => 'Productos:',
                'format' => 'html',
                'value' => function () use ($filas){
                    $mostrar="";
                    foreach($filas as $fila){

                        //Sacar nombre
                        $query = new Query;
                        $query->select('nombre')
                            ->from('productos')
                            ->where(['id' => $fila['id_producto']])
                            ->limit(1)
                            ;
                        $command = $query->createCommand();
                        // $command->sql returns the actual SQL
                        $nombreproducto = $command->queryOne();
                        
                        $mostrar.="*".$nombreproducto['nombre']." x ".$fila['cantidad']."* \r\n <br>";
                        }
                        return  ($mostrar);
                }
            ], 
        ],
    ]) ?>

</div>
