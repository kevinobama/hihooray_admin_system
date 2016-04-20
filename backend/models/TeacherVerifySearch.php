<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 07:39 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TchVerify;

/**
 * TeacherVerifySearch represents the model behind the search form about `common\models\TchVerify`.
 */
class TeacherVerifySearch extends TchVerify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'safe'],
            [['verify1', 'verify2', 'verify3', 'verify4', 'verify5', 'verify6', 'verify7', 'verify8', 'verify9', 'verify10', 'is_check_in'], 'integer'],
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
        $query = TchVerify::find();

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
            'verify1' => $this->verify1,
            'verify2' => $this->verify2,
            'verify3' => $this->verify3,
            'verify4' => $this->verify4,
            'verify5' => $this->verify5,
            'verify6' => $this->verify6,
            'verify7' => $this->verify7,
            'verify8' => $this->verify8,
            'verify9' => $this->verify9,
            'verify10' => $this->verify10,
            'is_check_in' => $this->is_check_in,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
