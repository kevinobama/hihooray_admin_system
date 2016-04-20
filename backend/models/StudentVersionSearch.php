<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\StudentVersion;

/**
 * StudentVersionSearch represents the model behind the search form about `common\models\StudentVersion`.
 */
class StudentVersionSearch extends StudentVersion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vid', 'version_number', 'xstatus', 'enforce'], 'integer'],
            [['version_name', 'version_url', 'filemd5', 'explain', 'create_time', 'update_time'], 'safe'],
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
        $query = StudentVersion::find();

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
            'vid' => $this->vid,
            'version_number' => $this->version_number,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
            'xstatus' => $this->xstatus,
            'enforce' => $this->enforce,
        ]);

        $query->andFilterWhere(['like', 'version_name', $this->version_name])
            ->andFilterWhere(['like', 'version_url', $this->version_url])
            ->andFilterWhere(['like', 'filemd5', $this->filemd5])
            ->andFilterWhere(['like', 'explain', $this->explain]);

        return $dataProvider;
    }
}
