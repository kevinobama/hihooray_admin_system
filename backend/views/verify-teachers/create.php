<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TchVerify */

$this->title = Yii::t('app', 'Create Tch Verify');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tch Verifies'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tch-verify-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
