<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentInfo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Student Info',
]) . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="student-info-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
