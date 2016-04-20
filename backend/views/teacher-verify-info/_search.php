<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeacherGivecoursesVerifyInfoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-givecourses-verify-info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'cat_id') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'datetime') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'verify_time') ?>

    <?php // echo $form->field($model, 'statistics_flag') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
