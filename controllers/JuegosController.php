<?php

namespace app\controllers;

use Yii;
use app\models\Juegos;
use app\models\JuegosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

//Subir imagen------------------------------------------    
use app\models\UploadForm;
use yii\web\UploadedFile;


/**
 * 
 * @author Alejandro Lopez
 * JuegosController implements the CRUD actions for Juegos model.
 * 
 */

class JuegosController extends Controller
{
    //Subir imagen//////////////////////////////////////////////////////////////

    /**
     * @author Alejandro Lopez
     * Subida de ficheros imagen
     */
    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // el archivo se subió exitosamente
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
    //////////////////////////////////////////////////////////////////////////////

    //***********************************************/
    public function actionLookup($term)
    {
        $results = [];
        foreach (Juegos::find()->andwhere("(creador like :q )", [':q' => '%' . $term . '%'])->asArray()->all() as $model) {
            $results[] = [
                'id' => $model['id'],
                'label' => $model['creador'],
            ];
            return \yii\helpers\Json::encode($results);
        }
    }
    //***********************************************/

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
     * Lists all Juegos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JuegosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Juegos model.
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
     * Creates a new Juegos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Juegos();

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload() && $model->save()) {
                $model->imageFile->saveAs('uploads/juegos/' . $model->imagen);

                // if($model->save()){
                // el archivo se subió exitosamente

                return $this->redirect(['view', 'id' => $model->id]);
                // }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Juegos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload() && $model->save()) {
                $model->imageFile->saveAs('uploads/juegos/' . $model->imagen);

                // if($model->save()){
                // el archivo se subió exitosamente

                return $this->redirect(['view', 'id' => $model->id]);
                // }
            }
        }


        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Juegos model.
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
     * Finds the Juegos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Juegos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Juegos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
