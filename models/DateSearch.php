<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Date;

/**
 * DateSearch represents the model behind the search form about `app\models\Date`.
 */
class DateSearch extends Date
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'direct_click', 'direct_order', 'adwords_click', 'adwords_order'], 'integer'],
            [['date'], 'safe'],
            [['direct_rate', 'adwords_rate'], 'number'],
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
        $query = Date::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date' => $this->date,
            'direct_rate' => $this->direct_rate,
            'direct_click' => $this->direct_click,
            'direct_order' => $this->direct_order,
            'adwords_rate' => $this->adwords_rate,
            'adwords_click' => $this->adwords_click,
            'adwords_order' => $this->adwords_order,
        ]);

        return $dataProvider;
    }
}
