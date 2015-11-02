<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'BES Upload';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bes-upload">
    <div class="row">
       <div class="col-lg-3">
       </div>
        <div class="col-lg-6">
         <h1 class='text-center'><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'upload','options' => ['enctype' => 'multipart/form-data']]); ?>
                <?= $form->field($model, 'creativeType') ?>
                <?= $form->field($model, 'landingPage') ?>
                <?= $form->field($model, 'width') ?>
                <?= $form->field($model, 'height') ?>
                <?= $form->field($model, 'creativeId') ?>
                <?= $form->field($model, 'creativeTradeId') ?>
                <?= $form->field($model, 'advertiserId') ?>
                <?= $form->field($model, 'adviewType') ?>
                <?= $form->field($model, 'file')->widget(FileInput::classname(),
            [
                'pluginOptions' => [
                    'previewFileType' => 'any',
       /*              'allowedFileExtensions' => $allowExtension, */
                    // 'minImageHeight' => $materialInfo['height'],
                    // 'maxImageHeight' => $materialInfo['height'] ,
                    // 'maxImageWidth'  => $materialInfo['width'],
                    // 'minImageWidth'  => $materialInfo['width'],
                    /* 'maxFileSize'    => $materialInfo['size'], */
            ],
            
           ]) ?>
                <div class="form-group text-center">
                    <?= Html::submitButton(Yii::t('app','Submit'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
