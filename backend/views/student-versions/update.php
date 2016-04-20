<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\StudentVersion */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Student Version',
]) . ' ' . $model->vid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Student Versions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vid, 'url' => ['view', 'id' => $model->vid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="student-version-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
