<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = Yii::t('app','Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
       <div class="col-lg-4">
       </div>
        <div class="col-lg-4">
         <h1 class='text-center'><?= Html::encode($this->title) ?></h1>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                <?= $form->field($model, 'username') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
                <div class="form-group text-center">
                    <?= Html::submitButton(Yii::t('app','Login'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
