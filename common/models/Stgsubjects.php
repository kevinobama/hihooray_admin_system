<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "edu_common_stages_subjects".
 *
 * @property integer $sta_sub_id
 * @property integer $stages_id
 * @property string $stages_name
 * @property integer $grades_id
 * @property string $grades_name
 * @property integer $subjects_id
 * @property string $subjects_name
 * @property integer $xtype
 * @property integer $sort
 * @property integer $question_type_id
 * @property string $question_type_name
 * @property integer $qt_sort
 */
class Stgsubjects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'edu_common_stages_subjects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stages_id', 'grades_id', 'subjects_id', 'xtype', 'sort', 'question_type_id', 'qt_sort'], 'integer'],
            [['stages_name', 'grades_name', 'subjects_name', 'question_type_name'], 'string', 'max' => 45],
//            [['stages_name', 'grades_name','subjects_name'], 'filter', 'filter' => 'trim', 'skipOnArray' => true],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sta_sub_id' => 'Sta Sub ID',
            'stages_id' => 'Stages ID',
            'stages_name' => 'Stages Name',
            'grades_id' => 'Grades ID',
            'grades_name' => 'Grades Name',
            'subjects_id' => 'Subjects ID',
            'subjects_name' => 'Subjects Name',
            'xtype' => 'Xtype',
            'sort' => 'Sort',
            'question_type_id' => 'Question Type ID',
            'question_type_name' => 'Question Type Name',
            'qt_sort' => 'Qt Sort',
        ];
    }


    /**
     * 返回年级联动列表
     * @param $data
     * @return array
     */
    public function getSubjects($data)
    {
        foreach($data as $value)
        {
            $allSubjects[$value['subjects_id']] =$value['subjects_name'];
        }

        foreach($allSubjects as $k =>$v)
        {
            $r[]=array("subjects_id"=>"$k","subjects_name"=>$v);
        }
        $all[0]['grades_id'] = '0';
        $all[0]['grades_name'] = '全部';
        $all[0]['subjects'] = $r;

        foreach($data as  $v)
        {
            $grade_subject[$v['grades_id']]['grades_id'] = $v['grades_id'];
            $grade_subject[$v['grades_id']]['grades_name'] = $v['grades_name'];
            $grade_subject[$v['grades_id']]['subjects'][] =array("subjects_id"=>$v['subjects_id'],"subjects_name"=>$v['subjects_name']);
        }
        $rt  = $all+$grade_subject;
        foreach($rt as $v)
        {
            $result[] =$v;
        }
        return $result;
    }

    /**
     * 年级和科目联动
     * @param $data
     * @return array
     */
    public function getStages($data)
    {
        foreach ($data as $value) {
            $allSubjects[$value['subjects_id']] = $value['subjects_name'];
        }
        foreach ($allSubjects as $k => $v) {
            $r[] = array("subjects_id" => "$k", "subjects_name" => $v);
        }
        $all[0]['stages_id'] = '0';
        $all[0]['stages_name'] = '全部';
        $all[0]['subjects'] = $r;
        foreach ($data as $v) {
            $stages_subject[$v['stages_id']]['stages_id'] = $v['stages_id'];
            $stages_subject[$v['stages_id']]['stages_name'] = $v['stages_name'];
            $stages_subject[$v['stages_id']]['subjects'][$v['subjects_id']] = array(
                'subjects_id' => $v['subjects_id'],
                'subjects_name' => $v['subjects_name']
            );
        }
        foreach ($stages_subject as $k=>$v) {
            $stages_data[$k]['stages_id'] = $v['stages_id'];
            $stages_data[$k]['stages_name'] = $v['stages_name'];
            $stages_data[$k]['subjects'] = array_values($v['subjects']);
        }
        $rt  = $all+$stages_data;
        foreach($rt as $v)
        {
            $result[] =$v;
        }
        return $result;
    }
}
