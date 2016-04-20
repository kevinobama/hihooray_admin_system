<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:15 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeacherGivecoursesVerifyIdcardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Teacher Givecourses Verify Idcards');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-givecourses-verify-idcard-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Teacher Givecourses Verify Idcard'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'realname',
            'id_card',
            'idcard_head',
            'idcard_front',
            'idcard_back',
            'flag',
            'datetime',
            'verify_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
