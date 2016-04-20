<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoinLog */

$this->title = Yii::t('app', 'Create Coin Log');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Coin Logs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coin-log-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
