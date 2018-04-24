<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AdpostMessage;
use frontend\models\AdpostMessageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\Adpost;
use yii\filters\AccessControl;

/**
 * AdpostMessageController implements the CRUD actions for AdpostMessage model.
 */
class AdpostMessageController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['result', 'error'],
                        'allow' => TRUE,
                    ],
                    [
                        'actions' => ['create', 'update', 'view','index','sentbox'],
                        'allow' => TRUE,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all AdpostMessage models.
     * @return mixed
     */
    public function actionIndex() {
        $this->layout = 'logged_in_user';
        $searchModel = new AdpostMessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSentbox() {
        $this->layout = 'logged_in_user';
        $searchModel = new AdpostMessageSearch();
        $dataProvider = $searchModel->searchSentBox(Yii::$app->request->queryParams);

        return $this->render('sendbox', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AdpostMessage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {

        $user_id = Yii::$app->request->getQueryParam('user_id');
        $viewLoad = Yii::$app->request->getQueryParam('view_load');

        $this->layout = 'logged_in_user';
        if ((int)$id > 0 && (int)$user_id > 0) {
            $model = new AdpostMessage();
            $adpostMessage = Yii::$app->request->post('Adpost');
            if (!empty($adpostMessage)) {
                $model->adpost_id = $id;
                $model->is_sent = 1;
                $model->message = $adpostMessage['message'];
                $model->user_id = $user_id;
                $model->created_by = Yii::$app->user->getId();
                $model->created_on = date('Y-m-d H:i:s');
                if ($model->save()) {
                    return 1;
                } else {
                    return 0;
                }
                Yii::$app->end();
            }


            $model = AdpostMessage::find()->where(['adpost_id' => $id,'user_id' => $user_id])->all();
            $adpostModel = Adpost::findOne($id);
            if ($model == NULL) {
                $this->redirect(['adpost-message/index']);
            }

            if ($viewLoad == 1) {
                $this->layout = 'ajax';
                return $this->render('view', [
                    'model' => $model,
                    'user_id' => $user_id,
                    'viewLoad' => $viewLoad,
                    'adpostModel' => $adpostModel,
                ]);
                Yii::$app->end();
            }

            return $this->render('view', [
                'model' => $model,
                'user_id' => $user_id,
                'viewLoad' => $viewLoad,
                'adpostModel' => $adpostModel,
            ]);
        } else {
            $this->redirect(['adpost-message/index']);
        }
    }



    /**
     * Creates a new AdpostMessage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $this->layout = 'ajax';
        $model = new AdpostMessage();
        $id = Yii::$app->request->getQueryParam('id');
        if ($model->load(Yii::$app->request->post()) ) {
            $model->adpost_id = $id;
            $model->user_id = Yii::$app->user->getId();
            $model->created_by = Yii::$app->user->getId();
            $model->created_on = date('Y-m-d H:i:s');
            if ($model->save()) {
                return 1;
            } else {
                return $this->render('create', [
                    'model' => $model,
                    'id' => $id
                ]);
            }

        }

        return $this->render('create', [
                    'model' => $model,
                    'id' => $id
        ]);
    }

    /**
     * Updates an existing AdpostMessage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing AdpostMessage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AdpostMessage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AdpostMessage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = AdpostMessage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
