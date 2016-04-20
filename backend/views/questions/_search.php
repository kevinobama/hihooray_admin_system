<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <!-- <?= $form->field($model, 'question_id') ?> -->

    <?= $form->field($model, 'question_title') ?>

    <!-- <?//= $form->field($model, 'question_detail') ?> -->

    <!-- <?= $form->field($model, 'reward') ?>

    <?= $form->field($model, 'add_time') ?> -->

    <?php // echo $form->field($model, 'expired_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'published_uid') ?>

    <?php // echo $form->field($model, 'published_nickname') ?>

    <?php // echo $form->field($model, 'published_username') ?>

    <?php // echo $form->field($model, 'has_attach') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'grade_id') ?>

    <?php // echo $form->field($model, 'subject_id') ?>

    <?php // echo $form->field($model, 'grade_name') ?>

    <?php // echo $form->field($model, 'subject_name') ?>

    <?php // echo $form->field($model, 'anonymous') ?>

    <?php // echo $form->field($model, 'view_count') ?>

    <?php // echo $form->field($model, 'is_recommend') ?>

    <?php // echo $form->field($model, 'attach_info') ?>

    <?php // echo $form->field($model, 'expired_id') ?>

    <?php // echo $form->field($model, 'question_type_id') ?>

    <?php // echo $form->field($model, 'question_type_name') ?>

    <?php // echo $form->field($model, 'fav_count') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
