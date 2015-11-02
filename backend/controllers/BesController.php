<?php
namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use backend\models\BesUploadForm;
use common\models\LoginForm;

/**
 * Site controller
 */
class BesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['upload'],
                        'allow' => true,
                        'roles' =>['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionUpload()
    {
        // $model = new LoginForm();
        $model = new BesUploadForm();
        $model->creativeType=1;
        $model->landingPage="https://itunes.apple.com";
        $model->width =320;
        $model->height =50;
        $model->adviewType=2;
        if($model->load(Yii::$app->request->post()))
        {
            $model->upload();
            return $this->render('result',[
           'model' => $model,

            ]);
        }else
        {
            return $this->render('upload',[
           'model' => $model,
            ]);
        }
    }

/*     public function actionLogin() */
    // {
        // if (!\Yii::$app->user->isGuest) {
            // return $this->goHome();
        // }

        // $model = new LoginForm();
        // if ($model->load(Yii::$app->request->post()) && $model->login()) {
            // return $this->goBack();
        // } else {
            // return $this->render('login', [
                // 'model' => $model,
            // ]);
        // }
    // }

    // public function actionLogout()
    // {
        // Yii::$app->user->logout();

        // return $this->goHome();
    /* } */
}
