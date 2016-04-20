<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CreditRule */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Credit Rule',
]) . ' ' . $model->rid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Credit Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rid, 'url' => ['view', 'id' => $model->rid]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="credit-rule-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
