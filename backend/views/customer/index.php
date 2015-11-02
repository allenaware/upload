<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Customers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('model', 'Create Customer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn',
            'header' => '编号',
            'mergeHeader' => false,


        ],
        'customer_name',
        'total_budget',
        'daily_budget',
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'currency',
            'value' => function ($model, $key, $index, $widget) {

             return ArrayHelper::map(Yii::$app->params['currency'],'id','name')[$model->currency];

            },
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'data' => ArrayHelper::map(Yii::$app->params['currency'],'id','name'),
                'options' => ['placeholder' => ''],

                'pluginOptions' => [
                    'allowClear' => true
                ],
            ],
            'vAlign' => 'middle',
            'format' => 'raw',
            'width' => '150px',
            'noWrap' => true
        ],
        'contact_number',
        'contact_person',
       [
           'class' => 'kartik\grid\BooleanColumn',
           'attribute' => 'status',
           'vAlign' => 'middle',
       ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'mergeHeader' => false,
            'vAlign' => 'middle',
            'contentOptions'=>['style'=>'width:30px;'],
            'template' => '{update}',

//            'urlCreator' => function ($action, $model, $key, $index) {
//                return '#';
//            },
//        'viewOptions'=>['title'=>$viewMsg, 'data-toggle'=>'tooltip'],
//        'updateOptions'=>['title'=>$updateMsg, 'data-toggle'=>'tooltip'],
//            'deleteOptions' => ['title' => "delete", 'data-toggle' => 'tooltip'],
        ],
//    ['class' => 'kartik\grid\CheckboxColumn']
    ];


    ?>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
//        'beforeHeader' => [
//            [
//                'columns' => [
//                    ['content' => 'Header Before 1', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
//                    ['content' => 'Header Before 2', 'options' => ['colspan' => 4, 'class' => 'text-center warning']],
//                    ['content' => 'Header Before 3', 'options' => ['colspan' => 3, 'class' => 'text-center warning']],
//                ],
//                'options' => ['class' => 'skip-export'] // remove this row from export
//            ]
//        ],
        'toolbar' => [
//        ['content'=>
//            Html::button('&lt;i class="glyphicon glyphicon-plus">&lt;/i>', ['type'=>'button', 'title'=>Yii::t('kvgrid', 'Add Book'), 'class'=>'btn btn-success', 'onclick'=>'alert("This will launch the book creation form.\n\nDisabled for this demo!");']) . ' '.
//            Html::a('&lt;i class="glyphicon glyphicon-repeat">&lt;/i>', ['grid-demo'], ['data-pjax'=>0, 'class' => 'btn btn-default', 'title'=>Yii::t('kvgrid', 'Reset Grid')])
//        ],
//        '{export}',
//            '{toggleData}'
        ],
        'pjax' => true,
        'bordered' => true,
        'striped' => true,
        'condensed' => false,
        'responsive' => true,
        'hover' => true,
        'export' => false,
        'floatHeader' => true,
        'floatHeaderOptions' => ['scrollingTop' => true],
        'showPageSummary' => false,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'footer'=>false

        ],
    ]);

    ?>







<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            // 'id',
//            'customer_name',
//            'total_budget',
//            'daily_budget',
////            'currency',
//            [
//                'class' => 'yii\grid\DataColumn',// this line is optional
//                'attribute' => 'currency',
//                'format' => 'text',
////                'label' => 'Currency',
//                'value'=>function ($model, $key, $index, $widget) {
//                     return Yii::$app->params['currency'][$model->currency];
//                },
//                'filter'=>Yii::$app->params['currency'],
//                'contentOptions'=>['style'=>'min-width: 100px;']
//
//
//            ],
//            'contact_number',
//            'contact_person',
//            [
//                'class' => 'yii\grid\DataColumn',// this line is optional
//                'attribute' => 'status',
//                'format' => 'text',
////                'label' => 'Currency',
//                'value'=>function ($model, $key, $index, $widget) {
//                     return ArrayHelper::map(Yii::$app->params['status'],'id','name')[$model->status];
//                },
//                'filter'=>ArrayHelper::map(Yii::$app->params['status'],'id','name'),
//                'contentOptions'=>['style'=>'min-width: 100px;']
//
//
//            ],
//            // 'site',
//            // 'email:email',
////            'industry',
////            'size',
//            // 'description:ntext',
//
//            [
//                'class' => 'yii\grid\ActionColumn',
//                'contentOptions'=>['style'=>'min-width: 50px;'],
//                'template' => '{view} {update}'
//
//            ],
//            // ['class' => 'yii\grid\ActionColumn', 'template' => '{update} {delete}'],
////            ['class' => 'yii\grid\ActionColumn'],
//
//        ],
//    ]); ?>

</div>
