<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 07:28 PM */
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MicroCourse;

/**
 * MicroCourseSearch represents the model behind the search form about `common\models\MicroCourse`.
 */
class MicroCourseSearch extends MicroCourse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'video_id', 'stage_id', 'grade_id', 'course_id', 'price', 'free', 'publish', 'xstatus', 'isauth', 'isfop', 'school_id', 'access', 'viewnums', 'favnums'], 'integer'],
            [['name', 'user_id', 'realname', 'stagename', 'gradename', 'coursename', 'description', 'create_time', 'update_time', 'video_url', 'video_small_image', 'video_middle_image', 'video_big_image', 'video_duration', 'content', 'persistentId', 'authtime'], 'safe'],
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
        $query = MicroCourse::find();

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
            'video_id' => $this->video_id,
            'stage_id' => $this->stage_id,
            'grade_id' => $this->grade_id,
            'course_id' => $this->course_id,
            'price' => $this->price,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'free' => $this->free,
            'publish' => $this->publish,
            'xstatus' => $this->xstatus,
            'isauth' => $this->isauth,
            'isfop' => $this->isfop,
            'authtime' => $this->authtime,
            'school_id' => $this->school_id,
            'access' => $this->access,
            'viewnums' => $this->viewnums,
            'favnums' => $this->favnums,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'user_id', $this->user_id])
            ->andFilterWhere(['like', 'realname', $this->realname])
            ->andFilterWhere(['like', 'stagename', $this->stagename])
            ->andFilterWhere(['like', 'gradename', $this->gradename])
            ->andFilterWhere(['like', 'coursename', $this->coursename])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'video_url', $this->video_url])
            ->andFilterWhere(['like', 'video_small_image', $this->video_small_image])
            ->andFilterWhere(['like', 'video_middle_image', $this->video_middle_image])
            ->andFilterWhere(['like', 'video_big_image', $this->video_big_image])
            ->andFilterWhere(['like', 'video_duration', $this->video_duration])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'persistentId', $this->persistentId]);
        
		//$query->orderBy('id desc');

        return $dataProvider;
    }
}
