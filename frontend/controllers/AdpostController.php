<?php

namespace frontend\controllers;

use backend\models\MobileModel;
use backend\models\Area;
use frontend\models\Document;
use Yii;
use frontend\models\Adpost;
use frontend\models\AdpostSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;


/**
 * AdpostController implements the CRUD actions for Adpost model.
 */
class AdpostController extends Controller {
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
     * Lists all Adpost models.
     * @return mixed
     */
    public function actionIndex($id) {
        echo $id;
//        $searchModel = new AdpostSearch();
//        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//
//        return $this->render('index', [
//            'searchModel' => $searchModel,
//            'dataProvider' => $dataProvider,
//        ]);
    }

    /**
     * Displays a single Adpost model.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        $this->layout = 'adpost';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Adpost model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = 'adpost';
        $model = new Adpost();
        if ($model->load(Yii::$app->request->post())) {
            $model->adpost_user_id = Yii::$app->user->getId();
            $model->created_on = date('Y-m-d H:i:s');
            //var_dump($model->save()); exit;
            if ($model->save()) {
                $adModel = Adpost::findOne($model->id);
                $adModel->adpost_id = "ad" . $model->id;
                $model->fileName = UploadedFile::getInstances($model, 'fileName');
                $adModel->save();
                $model->upload($adModel);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Adpost model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $this->layout = 'adpost';
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $model->updated_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                $model->fileName = UploadedFile::getInstances($model, 'fileName');
                $model->upload($model);
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Adpost model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetfieldvalues() {
        $fieldType = Yii::$app->request->post('fieldType');
        $id = Yii::$app->request->post('id');
        if ($fieldType != '') {
            if ($fieldType == 'adpost-model') {
                $mobileModelArr = ArrayHelper::map(
                    MobileModel::find()->where(['category_id' => $id, 'status' => 1])->all(), 'id', 'name'
                );
                echo json_encode($mobileModelArr);
            } else if ($fieldType == 'adpost-location') {
                $AreaArr = ArrayHelper::map(
                    Area::find()->where(['city_id' => $id, 'status' => 1])->all(), 'id', 'area'

                );
                echo json_encode($AreaArr);
            } else if ($fieldType == 'adpost-zipcode') {
                $area = Area::findOne($id);
                echo $area->zipcode;
                //echo json_encode($AreaArr);
            }
        }
    }

    public function actionAdpostphotodelete($id) {
        $document = Document::findOne($id);
        $filePath = $document->adpostDetail->getFilePath($document->adpostDetail);
        $photoUrl = $filePath . '/' . $document->save_name;
        if (file_exists($photoUrl)) {
            unlink($photoUrl);
            if ($document->delete()) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }

    }

    public function actionManagestatus() {
        if (isset($_REQUEST['adpost_id'],$_REQUEST['is_sold']) && $_REQUEST['adpost_id'] > 0) {
             $adpost = Adpost::findOne($_REQUEST['adpost_id']);
             $adpost->is_sold = $_REQUEST['is_sold'];
             $adpost->updated_on = date('Y-m-d H:i:s');
             echo (int) $adpost->save();
        } else {
            echo 0;
        }
    }

    public function actionManagearchivestatus() {
        if (isset($_REQUEST['adpost_id'],$_REQUEST['is_archived']) && $_REQUEST['adpost_id'] > 0) {
             $adpost = Adpost::findOne($_REQUEST['adpost_id']);
             $adpost->is_archived = $_REQUEST['is_archived'];
             $adpost->updated_on = date('Y-m-d H:i:s');
             echo (int) $adpost->save();
        } else {
            echo 0;
        }
    }



    /**
     * Finds the Adpost model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return Adpost the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Adpost::findOne($id)) !== NULL) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
