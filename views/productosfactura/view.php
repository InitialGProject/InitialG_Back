<?php

use Symfony\Component\Console\Input\Input;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\SqlDataProvider;
use yii\db\Query;

//Extraer las lineas de la factura
$query = new Query;
$query->select('id_producto, cantidad, conIVA, sinIVA')
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

        <?= Html::a('Generar PDF', ['productosfactura/pdf', 'id' =>$model->id, 'idus' =>$model->id_usuario], 
                    [
                        'class'=>'btn btn-danger',
                        'data-confirm'=>'Quieres Generar la factura?',
                        // $this->context->actionPdf()
                    ]); 
        ?>

        <!-- <?= Html::a(Yii::t('app', 'Borrar pedido'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?> -->
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
                'label' => 'Precio Base:',
                'value' => function ($data) {
                    return $data->total_si."€";
                }
            ],
            [
                'label' => 'IVA:',
                'value' => function ($data) {
                    return ($data->total-$data->total_si)."€";
                }
            ],
            [
                'attribute' => 'total',
                'label' => 'Precio Total:',
                'value' => function ($data) {
                    return $data->total."€";
                }
            ], 
            [
                'label' => 'Productos:',
                'format' => 'html',
                'value' => function () use ($filas){

                    $echo="
                        <table>
                            <tr>
                                <td style='width: 150px'><b> Nombre Producto    </b></td>
                                <td style='width: 100px'><b> Cantidad           </b></td>
                                <td style='width: 140px'><b> Precio sin IVA     </b></td>
                                <td style='width: 140px'><b> Precio con IVA     </b></td>
                            </tr>";

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
                            
                            $echo.="
                            <tr>
                                <td><a href='/bck/productos/view?id=".$fila['id_producto']."'>".$nombreproducto['nombre']."</a></td> 
                                <td>".$fila['cantidad']."</td>
                                <td>".$fila['sinIVA']."€</td>
                                <td>".$fila['conIVA']."€</td>
                            </tr>";
                        }

                        $echo.="
                    </table>";
                    return  ($echo);
                }
            ], 
            
        ],
        ]) 
        

    ?>
</div>
