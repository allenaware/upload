<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Customer;
use common\models\User;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserMapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('model', 'User Maps');
$this->params['breadcrumbs'][] = $this->title;
$this->params['cdata']=$cdata;
$this->params['udata']=$udata;
?>
<div class="user-map-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('model', 'Assign User to Customer'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php
    $gridColumns = [
        ['class' => 'kartik\grid\SerialColumn',
            'header' => '编号',
            'mergeHeader' => false,


        ],
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'customer_id',
            'value' => function ($model, $key, $index, $widget) {
                return $this->params['cdata'][$model->customer_id];

            },
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => [
                'data' => $cdata,
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
        [
            'class' => 'kartik\grid\DataColumn',
            'attribute' => 'user_id',
            'value' => function ($model, $key, $index, $widget) {
                return $this->params['udata'][$model->user_id];

            },
            'filterType' => GridView::FILTER_SELECT2,
            'filterWidgetOptions' => ['data' => $udata,
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
//        [
//            'class' => 'kartik\grid\BooleanColumn',
//            'attribute' => 'status',
//            'vAlign' => 'middle',
//        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'mergeHeader' => false,
            'vAlign' => 'middle',
            'contentOptions'=>['style'=>'width:30px;'],
            'template' => '{delete}',

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

    <!--    --><? //= GridView::widget([
    //        'dataProvider' => $dataProvider,
    //        'filterModel' => $searchModel,
    //        'columns' => [
    //            ['class' => 'yii\grid\SerialColumn'],
    //
    //            // 'id',
    //            [
    //                'class' => 'yii\grid\DataColumn',// this line is optional
    //                'attribute' => 'customer_id',
    //                'format' => 'text',
    ////                'label' => 'Currency',
    //                'value'=>function ($model, $key, $index, $widget) {
    //                     return $this->params['cdata'][$model->customer_id];
    //                },
    ////                'filter'=>ArrayHelper::map($this->params['cdata'],'id','customer_name'),
    //                'filter'=>$this->params['cdata'],
    //                'contentOptions'=>['style'=>'min-width: 100px;']
    //
    //
    //            ],
    //            [
    //                'class' => 'yii\grid\DataColumn',// this line is optional
    //                'attribute' => 'user_id',
    //                'format' => 'text',
    ////                'label' => 'Currency',
    //                'value'=>function ($model, $key, $index, $widget) {
    //                     return $this->params['udata'][$model->user_id];
    //                },
    //                'filter'=>$this->params['udata'],
    //
    //                'contentOptions'=>['style'=>'min-width: 100px;']
    //            ],
    //
    //            ['class' => 'yii\grid\ActionColumn','template'=>'{delete}',
    //             'contentOptions'=>['style'=>'max-width: 20px;']
    //
    //            ],
    //
    //        ],
    //    ]); ?>

</div>
