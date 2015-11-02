<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Customer;
use common\models\User;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $model common\models\UserMap */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="user-map-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'customer_id')->widget(Select2::classname(), [
                'data' => $cdata,
                'options' => ['placeholder' => 'Select a customer ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>

        </div>
        <div class="col-lg-4">

            <?= $form->field($model, 'user_id')->widget(Select2::classname(), [
                'data' => $udata,
                'options' => ['placeholder' => 'Select a user ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
            <!--            <select id="cc" class="easyui-combotree" data-options="url:'tree_data1.json',method:'get'" multiple style="width:100%; height: 50%;" ></select>-->


        </div>


    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('model', 'Create') : Yii::t('model', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
