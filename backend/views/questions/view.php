<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use backend\components\Ask;

/* @var $this yii\web\View */
/* @var $model common\models\Question */

$this->title = $model->question_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Questions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-view">
<div class="alert in alert-block fade alert-info">
	<a class="close" data-dismiss="alert">×</a>
	<strong>问题首问：</strong>
</div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'published_uid',
            'published_username',
            'question_title',
            'question_detail',
            'reward',
            'add_time',
            'expired_time',
            'update_time',
            //'stage_name',
            'grade_name',
            'subject_name',
            //'stars',
	        [
	            'attribute' => 'attach_info',    
	            'format' => 'raw',        
	            'value' => Ask::attachInfo($model->attach_info),            						
	            
	        ],            
        ],
    ]) ?>


<div class="alert in alert-block fade alert-info">
<a class="close" data-dismiss="alert">×</a>
<strong>问题追问：</strong>
</div>

<div id="ask-grid" class="grid-view">

    <?= GridView::widget([
        'dataProvider' => $dataProviderAppend,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],    
	        [
	            'attribute' => 'attach_info',            
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Ask::attachInfo($model->attach_info, 2);            						
	            }
	        ],         
            'question_title',
            'question_detail',
            'add_time',
            'published_username',

        ],
    ]); ?>

<div class="keys" style="display:none" title="/ask/1649"></div>
</div>
<div class="alert in alert-block fade alert-success">
<a class="close" data-dismiss="alert">×</a>
<strong>问题回答：</strong></div>
<div id="ask-grid" class="grid-view">

    <?= GridView::widget([
        'dataProvider' => $dataProviderAnswer,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],    
	        [
	            'attribute' => 'attach_info',            
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Ask::attachInfo($model->attach_info, 2);            						
	            }
	        ],            
            'question_title',
            'question_detail',
            'add_time',
            'published_username',
	        

        ],
    ]); ?>

<div class="keys" style="display:none" title="/ask/1649"></div>
</div>	</div>
    </div>
</div>

<div class="clear"></div>
<br>

</div>
