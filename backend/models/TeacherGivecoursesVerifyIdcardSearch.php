<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:15 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherGivecoursesVerifyIdcard;

/**
 * TeacherGivecoursesVerifyIdcardSearch represents the model behind the search form about `common\models\TeacherGivecoursesVerifyIdcard`.
 */
class TeacherGivecoursesVerifyIdcardSearch extends TeacherGivecoursesVerifyIdcard
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'realname', 'id_card', 'idcard_head', 'idcard_front', 'idcard_back', 'datetime', 'verify_time'], 'safe'],
            [['flag'], 'integer'],
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
        $query = TeacherGivecoursesVerifyIdcard::find();

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
            'flag' => $this->flag,
            'datetime' => $this->datetime,
            'verify_time' => $this->verify_time,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'id_card', $this->id_card])
            ->andFilterWhere(['like', 'idcard_head', $this->idcard_head])
            ->andFilterWhere(['like', 'idcard_front', $this->idcard_front])
            ->andFilterWhere(['like', 'idcard_back', $this->idcard_back]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
