<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\site\models\TagGroup */

$this->title = Yii::t('trcards', 'Create Tag Group');
$this->params['breadcrumbs'][] = ['label' => Yii::t('trcards', 'Tag Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tag-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
