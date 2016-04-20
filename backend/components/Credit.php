<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
class Credit {
	public static function group()
	{
		return array(
				'1' => '学生',
				'2' => '老师');
	}
	
	public static function type()
	{
		return array(
				'1' => '爱问',
				'2' => '爱达',
				'3' => '学生爱学',
				'4' => '老师爱学',
				'5' => '学生微课',
				'6' => '老师微课',
				'7' => '学生评论',
				'8' => '身份',
				'9' => '开课'
		);
	}
}