<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use kartik\widgets\SideNav;

use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('app','Bayescom backend system manager'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => Yii::t('app','Home'), 'url' => ['/site/index']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Yii::t('app','Login'), 'url' => ['/site/login']];
    } else {
//                $menuItems[] = ['label' => Yii::t('app','Master Data Manage'), 'url' => ['/admin']];
//                $menuItems[] = ['label' => Yii::t('app','Auth Manage'), 'url' => ['/admin']];
        $menuItems[] = [
            'label' => Yii::t('app','Logout').'(' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="row">
            <div class="col-lg-2">
                <?php
                $type = SideNav::TYPE_DEFAULT;
                $item = 'index';
                echo SideNav::widget([
                    'type' => SideNav::TYPE_DEFAULT,
                    'encodeLabels' => false,
                    'heading' => '<i class="glyphicon glyphicon-cog"></i>'.Yii::t('app','Master Data Manager') ,
                    'items' => [
                        // Important: you need to specify url as 'controller/action',
                        // not just as 'controller' even if default action is used.
                        ['label' => Yii::t('app','Customer Manage'), 'icon' => 'briefcase', 'url' => Url::to(['/customer/index', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='customer/index')],

                        ['label' => Yii::t('app','User Manage'), 'icon' => 'user', 
                        'url' => Url::to(['/user/index', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='user/index')],
                        ['label' => Yii::t('app','User Map Manage'), 'icon' => 'list', 'url' => Url::to(['/user-map/index', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='user-map/index')],

                        ['label' => Yii::t('app','Auth Manage'), 'icon' => 'lock', 'items' => [
                            ['label' => Yii::t('app','Assignment'), 'url' => Url::to(['/admin/assignment', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='admin/assignment')],
                            ['label' => Yii::t('app','Permission'), 'url' => Url::to(['/admin/permission', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='admin/permission')],
                            ['label' => Yii::t('app','Role'), 'url' => Url::to(['/admin/role', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='admin/role')],
                            ['label' => Yii::t('app','Route'), 'url' => Url::to(['/admin/route', 'type'=>$type]), 'active' => (Yii::$app->requestedRoute=='admin/route')],
                        ]],
                    ],
                ]);
                ?>

            </div>
            <div class="col-lg-10">
                <?= $content ?>
            </div>


        </div>

    </div>


</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Bayescom<?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
