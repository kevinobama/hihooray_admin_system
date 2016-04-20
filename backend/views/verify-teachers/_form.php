<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TchVerify */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tch-verify-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verify1')->textInput() ?>

    <?= $form->field($model, 'verify2')->textInput() ?>

    <?= $form->field($model, 'verify3')->textInput() ?>

    <?= $form->field($model, 'verify4')->textInput() ?>

    <?= $form->field($model, 'verify5')->textInput() ?>

    <?= $form->field($model, 'verify6')->textInput() ?>

    <?= $form->field($model, 'verify7')->textInput() ?>

    <?= $form->field($model, 'verify8')->textInput() ?>

    <?= $form->field($model, 'verify9')->textInput() ?>

    <?= $form->field($model, 'verify10')->textInput() ?>

    <?= $form->field($model, 'is_check_in')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
