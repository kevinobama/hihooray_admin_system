<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:25 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeacherGivecoursesVerifyTeachingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teacher Givecourses Verify Teachings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-givecourses-verify-teaching-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teacher Givecourses Verify Teaching'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'stages_id',
            'stages_name',
            'subjects_id',
            'subjects_name',
            'createtime',
            'is_recommend',
            'user_name',
            'flag',
            'verify_time',
            'rathing',
            'is_rathing',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
