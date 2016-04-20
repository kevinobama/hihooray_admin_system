<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CreditRule;

/**
 * CreditRuleSearch represents the model behind the search form about `common\models\CreditRule`.
 */
class CreditRuleSearch extends CreditRule
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rid', 'cycletype', 'cycletime', 'rewardnum', 'coin', 'credits', 'group_id'], 'integer'],
            [['rulename', 'action'], 'safe'],
            [['rates'], 'number'],
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
        $query = CreditRule::find();

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
            'rid' => $this->rid,
            'cycletype' => $this->cycletype,
            'cycletime' => $this->cycletime,
            'rewardnum' => $this->rewardnum,
            'coin' => $this->coin,
            'credits' => $this->credits,
            'group_id' => $this->group_id,
            'rates' => $this->rates,
        ]);

        $query->andFilterWhere(['like', 'rulename', $this->rulename])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
