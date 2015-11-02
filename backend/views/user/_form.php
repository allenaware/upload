<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use common\models\category\Industry;
use kartik\tree\TreeView;
use kartik\tree\TreeViewInput;
/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-lg-2">
          <?= $form->field($model, 'status')->dropdownList(ArrayHelper::map(Yii::$app->params['status'],'id','name')) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
        </div>

    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('model', 'Create') : Yii::t('model', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
