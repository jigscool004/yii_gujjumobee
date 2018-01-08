<?php
/**
 * Created by PhpStorm.
 * User: Jigar Kumar
 * Date: 12/31/2017
 * Time: 8:31 PM
 */

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\User;
use yii\web\UploadedFile;
use frontend\models\ChangePassword;

class UserController extends Controller {

    public $layout = 'logged_in_user';

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['index', 'logout', 'profile', 'delete','change-password'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function init() {
        parent::init(); // TODO: Change the autogenerated stub
        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/avtar/';
        Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/frontend/web/uploads/avtar/';
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        return $this->render('index');
    }


    public function actionProfile() {
        //http://webtips.krajee.com/advanced-upload-using-yii2-fileinput-widget/
        $model = User::findOne(Yii::$app->user->identity->getId());
        $model->scenario = 'userprofile';
        $oldPhoto = $model->photo;
        $oldAvatar = $model->getImageFilePath();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $image = UploadedFile::getInstance($model, 'photo');

            if (isset($image->baseName) && $image->baseName != "") {
                $path = Yii::$app->basePath . '/web/uploads/avtar/' . $image->baseName . "." . $image->extension;
                $model->photo = $image->name != '' ? $image->name : $model->photo;
                $image->saveAs($path);
            } else {
                $model->photo = $oldPhoto;
            }

            if ($model->save()) {
                if ($model->photo != "" && $oldPhoto != $model->photo) {
                    @unlink($oldAvatar);
                }
                $this->redirect(['user/profile']);
                Yii::$app->end();
            } else {
                $this->redirect(['user/profile']);
                exit;
            }

        }

        return $this->render('profile', [
            'model' => $model
        ]);

    }

    public function actionDelete() {
        $key = Yii::$app->request->post('key');
        $model = $this->findModel($key);
        $fileName = $model->getImageFilePath();
        if (!empty($fileName) && file_exists($fileName)) {
            if (unlink($fileName)) {
                $model->photo = '';
                $model->save();
            }
        }
    }

    public function actionChangePassword() {
        $model = new ChangePassword();

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->changePwd()) {
             $this->redirect(['user/change-password']);
        } else {
            return $this->render('changepassword',[
                'model' => $model,
            ]);
        }
    }

    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}