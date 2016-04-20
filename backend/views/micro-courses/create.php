<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\MicroCourse */

$this->title = Yii::t('app', 'Create Micro Course');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Micro Courses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="micro-course-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
