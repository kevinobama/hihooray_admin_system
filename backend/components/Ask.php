<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
class Ask
{

    /**
     *
     * 格式化图片显示
     *
     * @access public
     * @param unknown $str            
     * @return return_type
     * @version 1.0.0 (2014-5-5)
     * @author zhaowang
     */
    public static function attachInfo($str,$limit='1')
    {
        if ($str == '""') {
            return '无图';
        } else {
            $arr = json_decode($str, true);
            $urlbefore = 'http://hooray-ask.qiniudn.com/';
            $showstr = '';
            if($limit=='1'){
                $limit ="width='80' height='80'";
            }elseif($limit=='2'){
                $limit ="width='200' height='200'";
            }
            //[{"imgUrl":"mpg7dxsauy_1406174783.png","id":"236"}]
            if(isset($arr))
            foreach ($arr as $k => $v) {            		               	
				if(isset($v['imgUrl']) && strlen($v['imgUrl'])>0 ) {
					$url = $urlbefore . $v['imgUrl'];
                	$showstr .= "<a href='$url' class='qshow'><img src='$url' ".$limit."></a>";
				} elseif(isset($v['src']) && strlen($v['src'])>0 ) {
					$url = $v['src'];
                	$showstr .= "<a href='$url' class='qshow'><img src='$url' ".$limit."></a>";
				}
            }
            return $showstr;
        }
    }
    
    /*
     * 格式化题目状态
     */
    public static function Status($str)
    {
        return $str == '0' ? "<font color='red'>删除</font>" : "<font color='blue'>正常</font>";
    }
    
    /*
     * 格式化过期状态
     */
    public static function Expired($str)
    {
        $nowtime = date('Y-m-d H:i:s');
        return $str >= $nowtime ? "<font color='blue'>未过期</font>" : "<font color='red'>已过期</font>";
    }
    
    /*
     * 格式化长度
     */
    public static function substrLen($str)
    {
        return mb_substr($str, 0, 34,'utf-8');
    }




    public static function filterGrade()
    {
        return array(
            '5' => 'S一年级',
            '6' => 'S二年级',
            '7' => 'S三年级',
            '8' => 'S四年级',
            '9' => 'S五年级',
            '10' => 'S六年级',
            '11' => 'M一年级',
            '12' => 'M二年级',
            '13' => 'M三年级',
            '14' => 'L一年级',
            '15' => 'L二年级',
            '16' => 'L三年级'
        )
        ;
    }

    public static function filterSubject()
    {
        return array(
            '语文' => '语文',
            '数学' => '数学',
            '英语' => '英语',
            '物理' => '物理',
            '化学' => '化学',
            '生物' => '生物',
            '历史' => '历史',
            '政治' => '政治',
            '地理' => '地理',
            '社会' => '社会',
            '科学' => '科学',
            '常识' => '常识'
        );
    }

    public static function filterSolve($str)
    {
        return array(
            '1' =>'通过',
            '2' =>'否决',
            '3' =>'等待'
        );
    }
    public static function filterStatus()
    {
        return array(
            '0' => '删除',
            '1' => '正常'
        );
    }

    public static function filterExpired()
    {
        $nowtime = date('Y-m-d H:i:s');
        return array(
            "expired" => '已过',
            "available" => '未过'
        );
    }
}
