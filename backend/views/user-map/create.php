<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserMap */

$this->title = Yii::t('model', 'Create User Map');
$this->params['breadcrumbs'][] = ['label' => Yii::t('model', 'User Maps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-map-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cdata' => $cdata,
        'udata' => $udata,
    ]) ?>

</div>
