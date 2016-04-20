<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CoinLogsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Coin Logs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coin-log-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Coin Log'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
	        [
	            'attribute' => 'user_id',
	            'format' => 'raw',
	            'value' => function($model) {
		         	return Html::a($model->user_id, "/students/view?id=".$model->user_id, array('target'=>'_blank'));	            						
	            }
	        ],              
            'order_id',
            'order_type',
            'nums',
            'type',
            'remark',
            'detail:ntext',
            'status',
            'createtime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
