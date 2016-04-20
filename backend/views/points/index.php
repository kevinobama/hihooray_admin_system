<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CreditRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Credit Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="credit-rule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Credit Rule'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'rid',
            'rulename',
            'action',
            'cycletype',
            'cycletime:datetime',
            // 'rewardnum',
            // 'coin',
            // 'credits',
            // 'group_id',
            // 'rates',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
