<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CreditRule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credit-rule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rulename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'action')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cycletype')->textInput() ?>

    <?= $form->field($model, 'cycletime')->textInput() ?>

    <?= $form->field($model, 'rewardnum')->textInput() ?>

    <?= $form->field($model, 'coin')->textInput() ?>

    <?= $form->field($model, 'credits')->textInput() ?>

    <?= $form->field($model, 'group_id')->textInput() ?>

    <?= $form->field($model, 'rates')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
