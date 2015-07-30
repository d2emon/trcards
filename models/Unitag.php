<?php

namespace d2emon\trcards\models;

use Yii;

/**
 * This is the model class for table "unitag".
 *
 * @property integer $id
 * @property integer $tag_group_id
 * @property string $name
 * @property string $description
 * @property integer $parent_id
 *
 * @property TagGroup $tagGroup
 */
class Unitag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unitag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_group_id', 'parent_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['tag_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => TagGroup::className(), 'targetAttribute' => ['tag_group_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('trcards', 'ID'),
            'tag_group_id' => Yii::t('trcards', 'Tag Group ID'),
            'name' => Yii::t('trcards', 'Name'),
            'description' => Yii::t('trcards', 'Description'),
            'parent_id' => Yii::t('trcards', 'Parent ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTagGroup()
    {
        return $this->hasOne(TagGroup::className(), ['id' => 'tag_group_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupTag()
    {
	return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubTags()
    {
	return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSibTags()
    {
	return $this->hasMany(self::className(), ['parent_id' => 'parent_id'])->where(['not', ['id' => $this->id]]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupTags()
    {
	$tags   = [];
        $suptag = $this->supTag;
	while ($suptag) {
	    $tags[] = $suptag;
            $suptag = $suptag->supTag;
	}
	return array_reverse($tags);
    }
}
