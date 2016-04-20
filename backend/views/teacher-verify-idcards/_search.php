<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\TeacherGivecoursesVerifyIdcardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-givecourses-verify-idcard-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'realname') ?>

    <?= $form->field($model, 'id_card') ?>

    <?= $form->field($model, 'idcard_head') ?>

    <?= $form->field($model, 'idcard_front') ?>

    <?php // echo $form->field($model, 'idcard_back') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'datetime') ?>

    <?php // echo $form->field($model, 'verify_time') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
