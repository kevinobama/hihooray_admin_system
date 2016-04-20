<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:36 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentInfo;

/**
 * StudentInfoSearch represents the model behind the search form about `common\models\StudentInfo`.
 */
class StudentInfoSearch extends StudentInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'realname', 'nickname', 'gender', 'resideprovince', 'residecity', 'residedist', 'residecommunity', 'residesuite', 'telephone', 'education', 'profile', 'avatar', 'GradeName', 'idcard'], 'safe'],
            [['birthmonth', 'birthyear', 'birthday'], 'integer'],
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
        $query = StudentInfo::find();

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
            'birthmonth' => $this->birthmonth,
            'birthyear' => $this->birthyear,
            'birthday' => $this->birthday,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'resideprovince', $this->resideprovince])
            ->andFilterWhere(['like', 'residecity', $this->residecity])
            ->andFilterWhere(['like', 'residedist', $this->residedist])
            ->andFilterWhere(['like', 'residecommunity', $this->residecommunity])
            ->andFilterWhere(['like', 'residesuite', $this->residesuite])
            ->andFilterWhere(['like', 'telephone', $this->telephone])
            ->andFilterWhere(['like', 'education', $this->education])
            ->andFilterWhere(['like', 'profile', $this->profile])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'GradeName', $this->GradeName])
            ->andFilterWhere(['like', 'idcard', $this->idcard]);

		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
