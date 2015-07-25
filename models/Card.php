<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card".
 *
 * @property integer $id
 * @property integer $seriesId
 * @property integer $number
 * @property string $issueDateTime
 * @property string $endingDateTime
 * @property string $lastDateOfUse
 * @property integer $currentSumm
 * @property integer $statusId
 *
 * @property Series $series
 * @property Status $status
 */
class Card extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['seriesId', 'number', 'currentSumm', 'statusId'], 'integer'],
            [['number', 'issueDateTime', 'endingDateTime', 'lastDateOfUse', 'currentSumm'], 'required'],
            [['issueDateTime', 'endingDateTime', 'lastDateOfUse'], 'safe'],
            [['number'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'seriesId' => Yii::t('app', 'Серия'),
            'number' => Yii::t('app', 'Номер'),
            'issueDateTime' => Yii::t('app', 'Дата выпуска'),
            'endingDateTime' => Yii::t('app', 'Дата окончания'),
            'lastDateOfUse' => Yii::t('app', 'Дата посл. исп.'),
            'currentSumm' => Yii::t('app', 'Остаток'),
            'statusId' => Yii::t('app', 'Статус'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeries()
    {
        return $this->hasOne(Series::className(), ['id' => 'seriesId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'statusId']);
    }

    public function updateCardStatuses()
    {
        $connection = \Yii::$app->db;
        $connection->createCommand()->update('card', ['statusId' => 3], 'endingDateTime < now()')->execute();
    }
}
