<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Question */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question_detail')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reward')->textInput() ?>

    <?= $form->field($model, 'add_time')->textInput() ?>

    <?= $form->field($model, 'expired_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'published_uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published_nickname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'published_username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'has_attach')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'grade_id')->textInput() ?>

    <?= $form->field($model, 'subject_id')->textInput() ?>

    <?= $form->field($model, 'grade_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anonymous')->textInput() ?>

    <?= $form->field($model, 'view_count')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <?= $form->field($model, 'attach_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'expired_id')->textInput() ?>

    <?= $form->field($model, 'question_type_id')->textInput() ?>

    <?= $form->field($model, 'question_type_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fav_count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
