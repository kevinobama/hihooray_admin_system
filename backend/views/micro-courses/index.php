<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 07:28 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MicroCourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Micro Courses');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="micro-course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Micro Course'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'user_id',
            'realname',
            'video_id',
            'stage_id',
            'stagename',
            'grade_id',
            'gradename',
            'course_id',
            'coursename',
            'price',
            'description',
            'create_time',
            'update_time',
            'video_url:url',
            'video_small_image',
            'video_middle_image',
            'video_big_image',
            'video_duration',
            'content:ntext',
            'free',
            'publish',
            'xstatus',
            'isauth',
            'persistentId',
            'isfop',
            'authtime',
            'school_id',
            'access',
            'viewnums',
            'favnums',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
