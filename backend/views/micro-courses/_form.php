<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MicroCourse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="micro-course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'realname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_id')->textInput() ?>

    <?= $form->field($model, 'stage_id')->textInput() ?>

    <?= $form->field($model, 'stagename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grade_id')->textInput() ?>

    <?= $form->field($model, 'gradename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'course_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coursename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'video_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_small_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_middle_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_big_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video_duration')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'free')->textInput() ?>

    <?= $form->field($model, 'publish')->textInput() ?>

    <?= $form->field($model, 'xstatus')->textInput() ?>

    <?= $form->field($model, 'isauth')->textInput() ?>

    <?= $form->field($model, 'persistentId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'isfop')->textInput() ?>

    <?= $form->field($model, 'authtime')->textInput() ?>

    <?= $form->field($model, 'school_id')->textInput() ?>

    <?= $form->field($model, 'access')->textInput() ?>

    <?= $form->field($model, 'viewnums')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'favnums')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
