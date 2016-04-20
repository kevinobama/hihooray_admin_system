<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StudentVersion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-version-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'version_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'version_number')->textInput() ?>

    <?= $form->field($model, 'version_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filemd5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'explain')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <?= $form->field($model, 'update_time')->textInput() ?>

    <?= $form->field($model, 'xstatus')->textInput() ?>

    <?= $form->field($model, 'enforce')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
