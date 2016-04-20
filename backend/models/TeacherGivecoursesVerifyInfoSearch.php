<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:19 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherGivecoursesVerifyInfo;

/**
 * TeacherGivecoursesVerifyInfoSearch represents the model behind the search form about `common\models\TeacherGivecoursesVerifyInfo`.
 */
class TeacherGivecoursesVerifyInfoSearch extends TeacherGivecoursesVerifyInfo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cat_id', 'flag', 'statistics_flag'], 'integer'],
            [['user_id', 'username', 'name', 'number', 'images', 'datetime', 'verify_time'], 'safe'],
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
        $query = TeacherGivecoursesVerifyInfo::find();

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
            'cat_id' => $this->cat_id,
            'datetime' => $this->datetime,
            'flag' => $this->flag,
            'verify_time' => $this->verify_time,
            'statistics_flag' => $this->statistics_flag,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'images', $this->images]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
