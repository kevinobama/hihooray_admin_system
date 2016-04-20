<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teacher Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-info-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teacher Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'realname',
            'nickname',
            'gender',
            'birthmonth',
            // 'birthyear',
            // 'birthday',
            // 'resideprovince',
            // 'residecity',
            // 'residedist',
            // 'residecommunity',
            // 'residesuite',
            // 'telephone',
            // 'education',
            // 'profile:ntext',
            // 'avatar',
            // 'characteristics:ntext',
            // 'SchoolName',
            // 'GradeName',
            // 'idcard',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
