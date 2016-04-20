<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'realname') ?>

    <?= $form->field($model, 'nickname') ?>

    <?= $form->field($model, 'gender') ?>

    <?= $form->field($model, 'birthmonth') ?>

    <?php // echo $form->field($model, 'birthyear') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'resideprovince') ?>

    <?php // echo $form->field($model, 'residecity') ?>

    <?php // echo $form->field($model, 'residedist') ?>

    <?php // echo $form->field($model, 'residecommunity') ?>

    <?php // echo $form->field($model, 'residesuite') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'education') ?>

    <?php // echo $form->field($model, 'profile') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'GradeName') ?>

    <?php // echo $form->field($model, 'idcard') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
