<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeacherVerifySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tch-verify-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'verify1') ?>

    <?= $form->field($model, 'verify2') ?>

    <?= $form->field($model, 'verify3') ?>

    <?= $form->field($model, 'verify4') ?>

    <?php // echo $form->field($model, 'verify5') ?>

    <?php // echo $form->field($model, 'verify6') ?>

    <?php // echo $form->field($model, 'verify7') ?>

    <?php // echo $form->field($model, 'verify8') ?>

    <?php // echo $form->field($model, 'verify9') ?>

    <?php // echo $form->field($model, 'verify10') ?>

    <?php // echo $form->field($model, 'is_check_in') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
