<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeacherGivecoursesVerifyTeachingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-givecourses-verify-teaching-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'stages_id') ?>

    <?= $form->field($model, 'stages_name') ?>

    <?= $form->field($model, 'subjects_id') ?>

    <?php // echo $form->field($model, 'subjects_name') ?>

    <?php // echo $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'is_recommend') ?>

    <?php // echo $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'verify_time') ?>

    <?php // echo $form->field($model, 'rathing') ?>

    <?php // echo $form->field($model, 'is_rathing') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
