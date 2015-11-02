<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\tree\TreeViewInput;
use common\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
   <div class="row">
     <div class="col-lg-4">
      <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>
     </div>    
     <div class="col-lg-4">
      <?= $form->field($model, 'total_budget')->textInput() ?>
     </div>
     <div class="col-lg-4">
      <?= $form->field($model, 'daily_budget')->textInput() ?>
     </div>
   </div>
   <div class="row">
    <div class="col-lg-4">
      <?= $form->field($model, 'currency')->dropdownList(ArrayHelper::map(Yii::$app->params['currency'],'id','name')) ?>
    </div>  
    <div class="col-lg-4">
      <?= $form->field($model, 'site')->textInput(['maxlength' => true]) ?>
   </div>
     <div class="col-lg-4">
       <?= $form->field($model, 'email')->textInput(['maxlength'=>true]) ?>
     </div>
   </div>
   <div class="row">
     <div class="col-lg-4">
       <?= $form->field($model, 'contact_number')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-lg-4">
       <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>
     </div>
     <div class="col-lg-4">
      <?php 
       $industry = Category::find()->where(['name'=>'行业'])->one();
       $rootId = $industry->id;
      ?>
      <?= $form->field($model, 'industry')->widget( TreeViewInput::classname(),[
      'name' => 'Industry',
      'options' => ['placeholder' => 'Select Industry...'],
      'query' => Category::find()->where(['root'=>$rootId])->andWhere("lvl!=0")->addOrderBy('root','lft'), 
      'rootOptions' => [
        'label'=>'行业',  // custom root label
        'class'=>'text-success'
       ], 
       'pluginOptions' => [
       // 'headingOptions'=>['label'=>'行业分类'],
       'name' => 'kv-product', // input name
       'asDropdown' => true,   // will render the tree input widget as a dropdown.
       'multiple' => false,     // set to false if you do not need multiple selection
       'fontAwesome' => false,  // render font awesome icons
       'rootOptions' => [
        'label'=>'行业分类',  // custom root label
        'class'=>'text-success'
    ], 

          ]
     ]); ?>

     </div>
   </div> 
   <div class="row">
     <div class="col-lg-4">
       <?= $form->field($model, 'size')->textInput() ?>
     </div>
     <div class="col-lg-4">
       <?= $form->field($model, 'status')->dropdownList(ArrayHelper::map(Yii::$app->params['status'],'id','name')) ?>
     </div>
   </div>
   <div class="row">
     <div class="col-lg-12">
      <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
     </div>
   </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('model', 'Create') : Yii::t('model', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
