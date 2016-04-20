<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StudentVersionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-version-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vid') ?>

    <?= $form->field($model, 'version_name') ?>

    <?= $form->field($model, 'version_number') ?>

    <?= $form->field($model, 'version_url') ?>

    <?= $form->field($model, 'filemd5') ?>

    <?php // echo $form->field($model, 'explain') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'xstatus') ?>

    <?php // echo $form->field($model, 'enforce') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
