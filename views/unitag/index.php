<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use d2emon\trcards\helpers\UnitagPath;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('trcards', 'Unitags');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitag-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('trcards', 'Create Unitag'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
	    [
		'label' => Yii::t('trcards', 'Group'),
		'content' => function ($model, $key, $index, $column)
		{
		    return $model->tagGroup->name;
		},
            ],
	    [
		'label' => Yii::t('games', 'Path'),
		'content' => function ($model, $key, $index, $column)
		{
		    return Breadcrumbs::widget([
		        'homeLink' => false,
		        'links'    => UnitagPath::forModel($model),
		    ]);
		},
	    ],

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>

</div>
