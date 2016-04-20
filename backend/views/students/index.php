<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:36 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StudentInfoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Student Infos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-info-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Student Info'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user_id',
            'realname',
            'nickname',
	        [
	            'attribute' => 'nickname',
	            'value' => function($model) {
		            return "link";
	            }
	        ],
	        [
		        'attribute' => 'nickname',
		        'value' => function($model) {
			        return "link";
			    }
			],
            'gender',
            'birthmonth',
            'birthyear',
            'telephone',
            'education',
            'profile:ntext',
            'avatar',

		    
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
