<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Customer */

$this->title = $model->customer_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('model', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('model', 'Back'), ['customer/index'],['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'customer_name',
            'total_budget',
            'daily_budget',
//            'currency',
            [                      // the owner name of the model
                'attribute' => 'currency',
                'value' => Yii::$app->params['currency'][$model->currency],
            ],
            'site',
            'email:email',
            'contact_number',
            'contact_person',
            'industry',
            'size',
            [
                'attribute' => 'status',
                'value'     => ArrayHelper::map(Yii::$app->params['status'],'id','name')[$model->status],
            ],
            'description:ntext',
        ],
//        'columns' => [
//            [
//                'class' => DataColumn::className(), // this line is optional
//                'attribute' => 'currency',
//                'format' => 'text',
//                'label' => 'Currency',
//                'value' => 'Value',
//            ],
//        ]
    ]) ?>

</div>
