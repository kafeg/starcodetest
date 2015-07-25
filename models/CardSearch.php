<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Card;

/**
 * CardSearch represents the model behind the search form about `app\models\Card`.
 */
class CardSearch extends Card
{
    public $series;
    public $status;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'seriesId', 'number', 'currentSumm', 'statusId'], 'integer'],
            [['issueDateTime', 'endingDateTime', 'lastDateOfUse', 'series', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Card::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'seriesId' => $this->seriesId,
            'number' => $this->number,
            'issueDateTime' => $this->issueDateTime,
            'endingDateTime' => $this->endingDateTime,
            'lastDateOfUse' => $this->lastDateOfUse,
            'currentSumm' => $this->currentSumm,
            'statusId' => $this->statusId,
        ]);

        return $dataProvider;
    }
}
