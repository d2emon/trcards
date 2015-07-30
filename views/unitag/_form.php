<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use d2emon\trcards\models\TagGroup;
use d2emon\trcards\models\Unitag;

/* @var $this yii\web\View */
/* @var $model d2emon\trcards\models\Unitag */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unitag-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tag_group_id')->dropDownList(
	ArrayHelper::map(array_merge([new TagGroup], TagGroup::find()->all()), 'id', 'name')
    ) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(
	ArrayHelper::map(array_merge([new Unitag], Unitag::find()->where(['not', ['id' => $model->id]])->all()), 'id', 'name')
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('trcards', 'Create') : Yii::t('trcards', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
