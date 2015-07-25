<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "series".
 *
 * @property integer $id
 * @property string $seriesName
 *
 * @property Card[] $cards
 */
class Series extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'series';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seriesName'], 'required'],
            [['seriesName'], 'string', 'max' => 5]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'seriesName' => Yii::t('app', 'Серия карты'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCards()
    {
        return $this->hasMany(Card::className(), ['seriesId' => 'id']);
    }
}
