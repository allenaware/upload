<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

/* $this->title = Yii::t('model', 'Update {modelClass}: ', [ */
    // 'modelClass' => 'Customer',
/* ]) . ' ' . $model->id; */
$this->title = Yii::t('app', 'Update') . Yii::t('model','Customer') .':'. $model->customer_name;

$this->params['breadcrumbs'][] = ['label' => Yii::t('model', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->customer_name, 'url' => ['update', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('model', 'Update');
?>
<div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
