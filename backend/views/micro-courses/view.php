<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\MicroCourse */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Micro Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="micro-course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
