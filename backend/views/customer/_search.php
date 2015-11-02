<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_name') ?>

    <?= $form->field($model, 'total_budget') ?>

    <?= $form->field($model, 'daily_budget') ?>

    <?= $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'site') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'contact_number') ?>

    <?php // echo $form->field($model, 'contact_person') ?>

    <?php // echo $form->field($model, 'industry') ?>

    <?php // echo $form->field($model, 'size') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('model', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('model', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
