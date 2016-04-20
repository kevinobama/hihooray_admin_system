<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:25 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherGivecoursesVerifyTeaching;

/**
 * TeacherGivecoursesVerifyTeachingSearch represents the model behind the search form about `common\models\TeacherGivecoursesVerifyTeaching`.
 */
class TeacherGivecoursesVerifyTeachingSearch extends TeacherGivecoursesVerifyTeaching
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'stages_id', 'subjects_id', 'is_recommend', 'flag', 'rathing', 'is_rathing'], 'integer'],
            [['user_id', 'stages_name', 'subjects_name', 'createtime', 'user_name', 'verify_time'], 'safe'],
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
        $query = TeacherGivecoursesVerifyTeaching::find();

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
            'stages_id' => $this->stages_id,
            'subjects_id' => $this->subjects_id,
            'createtime' => $this->createtime,
            'is_recommend' => $this->is_recommend,
            'flag' => $this->flag,
            'verify_time' => $this->verify_time,
            'rathing' => $this->rathing,
            'is_rathing' => $this->is_rathing,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'stages_name', $this->stages_name])
            ->andFilterWhere(['like', 'subjects_name', $this->subjects_name])
            ->andFilterWhere(['like', 'user_name', $this->user_name]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
