<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherExamyuanVerify */

$this->title = Yii::t('app', 'Create Teacher Examyuan Verify');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teacher Examyuan Verifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-examyuan-verify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
