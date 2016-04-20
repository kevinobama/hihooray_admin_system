<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/06  
 * Time: 08:22 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TeacherExamyuanVerify;

/**
 * TeacherExamAuthorityVerifySearch represents the model behind the search form about `common\models\TeacherExamyuanVerify`.
 */
class TeacherExamAuthorityVerifySearch extends TeacherExamyuanVerify
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'flag', 'exam_num', 'hits', 'examer_num', 'display', 'order'], 'integer'],
            [['user_id', 'username', 'examyuan_name', 'createtime', 'images'], 'safe'],
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
        $query = TeacherExamyuanVerify::find();

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
            'createtime' => $this->createtime,
            'flag' => $this->flag,
            'exam_num' => $this->exam_num,
            'hits' => $this->hits,
            'examer_num' => $this->examer_num,
            'display' => $this->display,
            'order' => $this->order,
        ]);

        $query->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'examyuan_name', $this->examyuan_name])
            ->andFilterWhere(['like', 'images', $this->images]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
