<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Breadcrumbs;
use yii\data\ArrayDataProvider;
use d2emon\trcards\helpers\UnitagPath;

/* @var $this yii\web\View */
/* @var $model d2emon\trcards\models\Unitag */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('trcards', 'Unitags'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unitag-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('trcards', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('trcards', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('trcards', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
	    [
		'label' => Yii::t('trcards', 'Group'),
		'value' => $model->tagGroup->name,
	    ],
	    [
		'label' => Yii::t('trcards', 'Path'),
		'value' => Breadcrumbs::widget([
		    'homeLink' => false,
		    'links'    => UnitagPath::forModel($model),
		]),
		'format' => 'raw',
	    ],
	    [
		'label' => Yii::t('trcards', 'Same level'),
		'value'  => ListView::widget([
		    'dataProvider' => new ArrayDataProvider([
			'allModels' => $model->sibTags,
		    ]),
		    'itemView' => function ($model, $key, $index, $widget){
		        return "<li>".Html::a($model->name, ["/games/unitag/view", "id" => $model->id])."</li>";
		    },
		    'layout' => "<ul>\n{items}\n</ul>\n",
		    'emptyText' => '',
		]),
		'format' => 'raw',
	    ],
	    [
		'label' => Yii::t('games', 'Bottom level'),
		'value'  => ListView::widget([
		    'dataProvider' => new ArrayDataProvider([
			'allModels' => $model->subTags,
		    ]),
		    'itemView' => function ($model, $key, $index, $widget){
		        return "<li>".Html::a($model->name, ["/games/unitag/view", "id" => $model->id])."</li>";
		    },
		    'layout' => "<ul>\n{items}\n</ul>\n",
		    'emptyText' => '',
		]),
		'format' => 'raw',
	    ],
            'description:ntext',
        ],
    ]) ?>

</div>
