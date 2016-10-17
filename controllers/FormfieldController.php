<?php

namespace app\controllers;

use Yii;
use app\coreviewmodels\Formfields;
use app\coreviewmodels\SearchFormfields;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * FormfieldController implements the CRUD actions for Formfields model.
 */
class FormfieldController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Formfields models.
     * @return mixed
     */
    public function actionIndex() {

        $searchModel = new SearchFormfields();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Formfields model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    public function fieldType($type) {
        $type = str_replace('UNIX-DATE', 'INTEGER', $type);
        return $type;
    }

    /**
     * Creates a new Formfields model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Formfields();

//  ALTER TABLE vendors
//  ADD COLUMN email VARCHAR(100) NOT NULL,

        if ($model->load(Yii::$app->request->post())) {

            $model->fieldname = str_replace(' ', '', strtolower($model->title));
            $model->save();

            try {
                $new_model = "app\\viewmodels\\" . $model->model;
                $sql = 'ALTER TABLE ' . $new_model::tableName() . ' ADD `' . $model->fieldname . '` ';
                $sql .= "VARCHAR(".(string)$model->field_size.") AFTER id";

                $connection = Yii::$app->getDb();
                $command = $connection->createCommand($sql);
                $result = $command->queryAll();
            } catch (yii\db\Exception $ex) {
                
            }



//$model->dbConnection->createCommand($sql)->execute();



            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Formfields model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Formfields model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Formfields model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Formfields the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Formfields::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
