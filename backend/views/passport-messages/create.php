<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\PassportMessages */

$this->title = Yii::t('app', 'Create Passport Messages');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Passport Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="passport-messages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
