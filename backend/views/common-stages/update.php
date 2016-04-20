<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CommonStages */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Common Stages',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Common Stages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="common-stages-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
