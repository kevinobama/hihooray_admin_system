<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MicroCourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="micro-course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'realname') ?>

    <?= $form->field($model, 'video_id') ?>

    <?php // echo $form->field($model, 'stage_id') ?>

    <?php // echo $form->field($model, 'stagename') ?>

    <?php // echo $form->field($model, 'grade_id') ?>

    <?php // echo $form->field($model, 'gradename') ?>

    <?php // echo $form->field($model, 'course_id') ?>

    <?php // echo $form->field($model, 'coursename') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'video_url') ?>

    <?php // echo $form->field($model, 'video_small_image') ?>

    <?php // echo $form->field($model, 'video_middle_image') ?>

    <?php // echo $form->field($model, 'video_big_image') ?>

    <?php // echo $form->field($model, 'video_duration') ?>

    <?php // echo $form->field($model, 'content') ?>

    <?php // echo $form->field($model, 'free') ?>

    <?php // echo $form->field($model, 'publish') ?>

    <?php // echo $form->field($model, 'xstatus') ?>

    <?php // echo $form->field($model, 'isauth') ?>

    <?php // echo $form->field($model, 'persistentId') ?>

    <?php // echo $form->field($model, 'isfop') ?>

    <?php // echo $form->field($model, 'authtime') ?>

    <?php // echo $form->field($model, 'school_id') ?>

    <?php // echo $form->field($model, 'access') ?>

    <?php // echo $form->field($model, 'viewnums') ?>

    <?php // echo $form->field($model, 'favnums') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
