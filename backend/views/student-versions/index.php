<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentVersionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Student Versions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-version-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student Version'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vid',
            'version_name',
            'version_number',
            'version_url:url',
            'filemd5',
            // 'explain:ntext',
            // 'create_time',
            // 'update_time',
            // 'xstatus',
            // 'enforce',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
