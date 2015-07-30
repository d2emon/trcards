<?php

namespace d2emon\trcards\models;

use Yii;

/**
 * This is the model class for table "tag_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 *
 * @property Unitag[] $unitags
 */
class TagGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('trcards', 'ID'),
            'name' => Yii::t('trcards', 'Name'),
            'description' => Yii::t('trcards', 'Description'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnitags()
    {
        return $this->hasMany(Unitag::className(), ['tag_group_id' => 'id']);
    }
}
