<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherGivecoursesVerifyTeaching */

$this->title = Yii::t('app', 'Create Teacher Givecourses Verify Teaching');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teacher Givecourses Verify Teachings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-givecourses-verify-teaching-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
