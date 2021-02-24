<?php

namespace app\controllers;

use Yii;
use app\models\Sugerencias;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SugerenciasController implements the CRUD actions for Sugerencias model.
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

    /** Borra un conjunto de sugerencias
     * 
     * @param char $estado POST
     * @param array $idselec POST
     */
    public function actionAceptar()
    {
        $estado = Yii::$app->request->post('comentario');
        $idselec = (array)Yii::$app->request->post('idselec');

        foreach (Sugerencias::findAll($idselec) as $entrada) {
            $entrada->id = $estado;
            if (!$entrada->save()) {
                //Tratar el error, añadiendo mensajes a una lista, o lo que se desee
            }
        }
        $this->redirect(['sugerencias/index']);
    }

    /**
     * Displays a single Sugerencias model.
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
     * Creates a new Sugerencias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sugerencias();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Sugerencias model.
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

        foreach (Sugerencias::findAll($idselec) as $entrada) {
            $entrada->autor_id = $id;
            if (!$entrada->save()) {
                $this->findModel($entrada)->delete();
                //Tratar el error, añadiendo mensajes a una lista, o lo que se desee
            }
        }
        return $this->redirect(['sugerencias/index']);

        //return $this->redirect(['index']);
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
