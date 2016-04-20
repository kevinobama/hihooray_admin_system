<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CreditRule */

$this->title = Yii::t('app', 'Create Credit Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Credit Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credit-rule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
