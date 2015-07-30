<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\modules\site\models\Unitag */

$this->title = Yii::t('trcards', 'Create Unitag');
$this->params['breadcrumbs'][] = ['label' => Yii::t('trcards', 'Unitags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitag-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
