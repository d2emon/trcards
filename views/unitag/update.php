<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\modules\site\models\Unitag */

$this->title = Yii::t('trcards', 'Update {modelClass}: ', [
    'modelClass' => 'Unitag',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('trcards', 'Unitags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('trcards', 'Update');
?>
<div class="unitag-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
