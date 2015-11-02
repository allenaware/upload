<?php
use kartik\tree\TreeView;
use common\models\Category;
use kartik\tree\TreeViewInput;
 
$this->title = Yii::t('app','Categories Data');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
<div class="col-lg-12">
<?php
echo TreeView::widget([
    // single query fetch to render the tree
    // use the Product model you have in the previous step
    'query' => Category::find()->addOrderBy('root, lft'), 
    'nodeAddlViews' => [
     \kartik\tree\Module::VIEW_PART_2 => '@backend/views/category/_treePart2'
    ],
    'headingOptions' => ['label' => '分类数据'],
    'fontAwesome' => false,     // optional
    'isAdmin' => true,         // optional (toggle to enable admin mode)
    'displayValue' => 1,        // initial display value
    'softDelete' => true,       // defaults to true
    'cacheSettings' => [        
        'enableCache' => true   // defaults to true
    ]
]);

?>

</div>

</div>
