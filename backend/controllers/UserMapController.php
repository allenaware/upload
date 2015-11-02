<?php

namespace backend\controllers;

use Yii;
use common\models\UserMap;
use common\models\UserMapSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Customer;
use common\models\User;

/**
 * UserMapController implements the CRUD actions for UserMap model.
 */
class UserMapController extends Controller
{
    public $layout = 'sideNavLayout';
    public $cdata = [];
    public $udata =[];

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserMap models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserMapSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $customers = Customer::find()->all();
        $users = User::find()->all();
        $this->cdata = ArrayHelper::map($customers, 'id', 'customer_name');
        $this->udata = ArrayHelper::map($users, 'id', 'username');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'cdata'      => $this->cdata,
            'udata' =>$this->udata,

        ]);
    }

    /**
     * Displays a single UserMap model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),

        ]);
    }

    /**
     * Creates a new UserMap model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserMap();
        $customers = Customer::find()->all();
        $users = User::find()->all();
        $this->cdata = ArrayHelper::map($customers, 'id', 'customer_name');
        $this->udata = ArrayHelper::map($users, 'id', 'username');


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cdata' => $this->cdata,
                'udata' => $this->udata,
            ]);
        }
    }

    /**
     * Updates an existing UserMap model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
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
     * Deletes an existing UserMap model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserMap model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserMap the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserMap::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
