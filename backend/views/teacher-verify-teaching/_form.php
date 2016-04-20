<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TeacherGivecoursesVerifyTeaching */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-givecourses-verify-teaching-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stages_id')->textInput() ?>

    <?= $form->field($model, 'stages_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subjects_id')->textInput() ?>

    <?= $form->field($model, 'subjects_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createtime')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'flag')->textInput() ?>

    <?= $form->field($model, 'verify_time')->textInput() ?>

    <?= $form->field($model, 'rathing')->textInput() ?>

    <?= $form->field($model, 'is_rathing')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
