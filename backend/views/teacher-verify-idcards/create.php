<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherGivecoursesVerifyIdcard */

$this->title = Yii::t('app', 'Create Teacher Givecourses Verify Idcard');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teacher Givecourses Verify Idcards'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-givecourses-verify-idcard-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
