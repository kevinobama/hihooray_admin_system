<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeacherExamAuthorityVerifySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-examyuan-verify-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'examyuan_name') ?>

    <?= $form->field($model, 'createtime') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'exam_num') ?>

    <?php // echo $form->field($model, 'hits') ?>

    <?php // echo $form->field($model, 'examer_num') ?>

    <?php // echo $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'display') ?>

    <?php // echo $form->field($model, 'order') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
