<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:17 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\components\Ask;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '问题管理');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],    
            'question_id',           
	        [
	            'attribute' => 'status',
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Ask::Status($model->status);            						
	            },	            
	            'filter' => Ask::filterStatus()
	        ],	
	        [
	            'attribute' => 'expired_time',
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Ask::Expired($model->expired_time);            						
	            },	            
	            'filter' => Ask::filterExpired()
	        ],		        
	        [
	            'attribute' => 'attach_info',            
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Ask::attachInfo($model->attach_info);            						
	            }
	        ], 			
			'question_title',
			'question_detail',
			'reward',
	        [
	            'attribute' => 'grade_id',
	            'value' => function($model) {
		         	return $model->grade_name;            						
	            },	            
	            'filter' => Ask::filterGrade()
	        ],	
	        [
	            'attribute' => 'subject_name',            
	            'filter' => Ask::filterSubject()
	        ],	
	        'add_time',	
			[
	            'attribute' => 'published_username',
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Html::a($model->published_username, "/students/view?id=".$model->published_uid, array('target'=>'_blank'));	            						
	            }
	        ],
            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} | {delete}'],
        ],
    ]); ?>
</div>
