<!--/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 07:39 PM */-->
<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TeacherVerifySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tch Verifies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tch-verify-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Tch Verify'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'verify1',
            'verify2',
            'verify3',
            'verify4',
            'verify5',
            'verify6',
            'verify7',
            'verify8',
            'verify9',
            'verify10',
            'is_check_in',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
