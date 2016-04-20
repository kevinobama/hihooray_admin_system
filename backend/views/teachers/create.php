<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TeacherInfo */

$this->title = Yii::t('app', 'Create Teacher Info');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Teacher Infos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
