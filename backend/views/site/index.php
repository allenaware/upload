<?php
use yii\helpers\Html;
use kartik\tree\TreeView;
use common\models\Category;
/* @var $this yii\web\View */

$this->title = 'Bayescom';
?>
<div class="site-index">

    <div class="jumbotron">

    </div>

    <div class="body-content">

        <div class="row">
         <div class="col-lg-4">
           <div class="jumbotron">
             <h2>主数据管理</h2>

               <p class="lead">客户，用户，权限...</p>

              <?= Html::a('主数据管理', ['customer/index'], ['class' => 'btn btn-lg btn-primary btn-outline', 'style'=>'width:100%']) ?>
           </div>
         </div>
         <div class="col-lg-4">
           <div class="jumbotron">
             <h2>分类数据管理</h2>

               <p class="lead">分类，列表可选项...</p>
               <?= Html::a('分类数据管理', ['category/index'], ['class' => 'btn btn-lg btn-primary btn-outline', 'style'=>'width:100%' ]) ?>

           </div>
         </div>
         <div class="col-lg-4">
           <div class="jumbotron">
             <h2>业务数据管理</h2>

               <p class="lead">实时参数调整...</p>
               <?= Html::a('业务数据管理', ['category/index'], ['class' => 'btn btn-lg btn-primary btn-outline','style'=>'width:100%']) ?>
           </div>
         </div>

        </div>

        </div>
    </div>
</div>
