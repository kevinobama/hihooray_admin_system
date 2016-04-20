<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:17 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Question;

/**
 * QuestionSearch represents the model behind the search form about `common\models\Question`.
 */
class QuestionSearch extends Question
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'reward', 'has_attach', 'status', 'grade_id', 'subject_id', 'anonymous', 'view_count', 'is_recommend', 'expired_id', 'question_type_id', 'fav_count'], 'integer'],
            [['question_title', 'question_detail', 'add_time', 'expired_time', 'update_time', 'published_uid', 'published_nickname', 'published_username', 'grade_name', 'subject_name', 'attach_info', 'question_type_name'], 'safe'],
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
        $query = Question::find();

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
            'question_id' => $this->question_id,
            'reward' => $this->reward,
            'add_time' => $this->add_time,
            'update_time' => $this->update_time,
            'has_attach' => $this->has_attach,
            'status' => $this->status,
            'grade_id' => $this->grade_id,
            'subject_id' => $this->subject_id,
            'anonymous' => $this->anonymous,
            'view_count' => $this->view_count,
            'is_recommend' => $this->is_recommend,
            'expired_id' => $this->expired_id,
            'question_type_id' => $this->question_type_id,
            'fav_count' => $this->fav_count,
        ]);

        $query->andFilterWhere(['like', 'question_title', $this->question_title])
            ->andFilterWhere(['like', 'question_detail', $this->question_detail])
            ->andFilterWhere(['like', 'published_uid', $this->published_uid])
            ->andFilterWhere(['like', 'published_nickname', $this->published_nickname])
            ->andFilterWhere(['like', 'published_username', $this->published_username])
            ->andFilterWhere(['like', 'grade_name', $this->grade_name])
            ->andFilterWhere(['like', 'subject_name', $this->subject_name])
            ->andFilterWhere(['like', 'attach_info', $this->attach_info])
            ->andFilterWhere(['like', 'question_type_name', $this->question_type_name]);
							
		if(isset($params['QuestionSearch']['expired_time']) && $params['QuestionSearch']['expired_time'] == 'expired') {
			$query->andFilterWhere(['<', 'expired_time', date('Y-m-d H:i:s')]);
		} elseif(isset($params['QuestionSearch']['expired_time']) && $params['QuestionSearch']['expired_time'] ==  'available'){
			$query->andFilterWhere(['>=', 'expired_time', date('Y-m-d H:i:s')]);
		}
										
		$query->orderBy('question_id desc');

		return $dataProvider;		
    }
}
