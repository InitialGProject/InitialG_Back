<?php

namespace app\controllers;

use Yii;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Sugerencias;

/**
 * 
 * @author Juan Sanz
 * SugerenciasController implements the CRUD actions for Sugerencias model.
 * 
 */

class SugerenciasController extends Controller
{
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
     * Lists all Sugerencias models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sugerencias::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Sugerencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sugerencias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['sugerencias/index', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Sugerencias model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionBorrar()
    {
        $id = Yii::$app->request->post('comentario');
        $idselec = (array)Yii::$app->request->post('idselec');

        foreach (Sugerencias::findAll($idselec) as $sugerencia) {
            $sugerencia->autor_id = $id;
            $this->findModel($sugerencia)->delete();
        }
        return $this->redirect(['sugerencias/index']);
    }

    /**
     * Finds the Sugerencias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sugerencias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sugerencias::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
