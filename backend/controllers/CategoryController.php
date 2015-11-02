<?php

namespace backend\controllers;

use Yii;
use common\models\Category;
class CategoryController extends \yii\web\Controller {
    public function actionIndex()
    {
        return $this->render('index');
    }
}
