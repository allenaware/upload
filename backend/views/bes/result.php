<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'BES Upload Result';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bes-Result">
    <div class="row">
       <div class="col-lg-3">
       </div>
        <div class="col-lg-6">
         <h1 class='text-center'><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'upload','options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'result')->textArea() ?>
                <div class="form-group text-center">
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
