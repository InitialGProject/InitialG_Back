<?php

namespace app\controllers;

use Yii;
use app\models\ProductosFacturacion;
use app\models\ProductosfacturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;


/**
 * ProductosfacturaController implements the CRUD actions for ProductosFacturacion model.
 */
class ProductosfacturaController extends Controller
{

    public function actionPdf($id, $idus){
        
        $query = new Query;
            $query->select('id_producto, cantidad, conIVA, sinIVA')
            ->from('productos_factura')
            ->where(['id_facturacion' => $id]);
            $command = $query->createCommand();
            // $command->sql returns the actual SQL
        $filasFactura = $command->queryAll();
      
        $Particulos = 0;
        $PSIVA = 0;
        $PCIVA = 0;
        $IVA = 0;

        $echo="
            <table>
                <tr>
                    <td style='width: 150px'><b> Nombre Producto    </b></td>
                    <td style='width: 100px'><b> Cantidad           </b></td>
                    <td style='width: 140px'><b> Precio sin IVA     </b></td>
                    <td style='width: 140px'><b> IVA                </b></td>
                    <td style='width: 140px'><b> Precio con IVA     </b></td>

                </tr>";

            foreach($filasFactura as $fila){

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
                
                //Saco IVA
                $query = new Query;
                $query->select('IVA')
                    ->from('productos')
                    ->where(['id' => $fila['id_producto']])
                    ->limit(1)
                    ;
                $command = $query->createCommand();
                $IVAProducto = $command->queryOne();

                //Sumamos
                $Particulos+=$fila['cantidad'];
                $PSIVA+=$fila['sinIVA'];
                $PCIVA+=$fila['conIVA'];
                $IVA+= $fila['conIVA']-$fila['sinIVA'];
                $echo.="
                <tr>
                    <td>".$nombreproducto['nombre']."</td> 
                    <td>".$fila['cantidad']."</td>
                    <td>".$fila['sinIVA']."€ </td>
                    <td>".$IVAProducto['IVA']."% </td>
                    <td>".$fila['conIVA']."€ </td>
                </tr>";
            }

            $echo.="
            <tr>
                <td></td> 
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td> 
                <td>$Particulos Articulos</td>
                <td>$PSIVA €    </td>
                <td>$IVA €      </td> 
                <td>$PCIVA €    </td>
                
            </tr>
            </table>
            <br><div><b>Total</b> $PCIVA €    </td></div>
        ";

        $query = new Query;
        $query->select('fecha_compra, direccion, pais, cp, provincia, total_si, total, facturaPP, nombre_compra, email_compra, telefono_compra')
        ->from('productos_facturacion')
        ->where(['id' => $id]);
        $command = $query->createCommand();
        // $command->sql returns the actual SQL
        $factura = $command->queryAll();

      //doc.line(0, 80, 600, 80) // horizontal line
        $mpdf = new \Mpdf\Mpdf(['tempDir' => '/var/www/html/']);
        //$mpdf->showImageErrors = true;

        //Facturador
        $mpdf->Image('http://alum3.iesfsl.org/assets/img/logo.png', 0, 0, 210, 297, 'png', '', true, true);
        $mpdf->WriteHTML('<img src="http://alum3.iesfsl.org/assets/img/logo.png" width="140" />');
        $mpdf->WriteHTML('<br>INITIAL G');
        $mpdf->WriteHTML('NIF:123456789ASDF');
        $mpdf->WriteHTML('C/Falsa de prueba 666');
        $mpdf->WriteHTML('VALENCIA ES');
        $mpdf->WriteHTML('FACTURA Nº '.$id.'//'.$factura[0]['facturaPP']);

        //Usuario
        $mpdf->WriteHTML("<br>Datos comprador");
        $mpdf->WriteHTML('Fecha Compra: '.$factura[0]['fecha_compra']);
        $mpdf->WriteHTML('Nombre: '.$factura[0]['nombre_compra']);
        $mpdf->WriteHTML('Correo: '.$factura[0]['email_compra']);
        $mpdf->WriteHTML('Telefono: '.$factura[0]['telefono_compra']);
        $mpdf->WriteHTML('Direccion: '.$factura[0]['direccion']);
        $mpdf->WriteHTML('CP: '.$factura[0]['cp']);
        $mpdf->WriteHTML('Provincia: '.$factura[0]['provincia']);
        $mpdf->WriteHTML('Pais: '.$factura[0]['pais']);

        //Compra
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML('<br>');
        $mpdf->WriteHTML($echo);

        
        $mpdf->Output();
     }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductosFacturacion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosfacturaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductosFacturacion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ProductosFacturacion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductosFacturacion();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductosFacturacion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductosFacturacion model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductosFacturacion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductosFacturacion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductosFacturacion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
