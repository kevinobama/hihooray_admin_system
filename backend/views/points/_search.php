<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CreditRuleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="credit-rule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'rid') ?>

    <?= $form->field($model, 'rulename') ?>

    <?= $form->field($model, 'action') ?>

    <?= $form->field($model, 'cycletype') ?>

    <?= $form->field($model, 'cycletime') ?>

    <?php // echo $form->field($model, 'rewardnum') ?>

    <?php // echo $form->field($model, 'coin') ?>

    <?php // echo $form->field($model, 'credits') ?>

    <?php // echo $form->field($model, 'group_id') ?>

    <?php // echo $form->field($model, 'rates') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
