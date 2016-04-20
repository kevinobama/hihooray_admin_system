 <?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
class Verify
{
	public static function filterGroup()
	{
		return array(
				'1' => '学生',
				'2' => '老师');
	}
	
	public static function filterType()
	{
		return array(
				'1' => '提问',
				'2' => '解答',
				'3' => 's在线课程',
				'4' => 't在线课程',
				'5' => 's微课',
				'6' => 't微课',
				'7' => 's评论',
				'8' => '身份',
				'9' => '开课'
		);
	}
    public static function showPhoto($src)
    {   
    	$src="http://hooray-system.hihooray.net/".$src;
    	$limit = "width='150'; height='100';";
    	echo  "<a href='$src' style='width:150px; height:100px'; ><img src='$src' " . $limit . "></a>";
    } 
    public static function showPhotom($src)
    {
    	$src="http://hooray-system.hihooray.net/".$src;
    	$limit = "width='100'; height='80';";
    	echo  "<a href='$src' style='width:150px; height:100px'; ><img src='$src' " . $limit . "></a>";
    }
    public static function showPhotor($src)
    {
    	$src="http://hooray-system.hihooray.net/".$src;
    	$limit = "width='35'; height='35';";
    	echo  "<a href='$src' style='width:150px; height:100px'; ><img src='$src' " . $limit . "></a>";
    }
    public static function filterFlag($flag)
    {
    	return array(
    			'-1'=>'拒绝',
    			'0'=>'未证',
    			'1'=>'等待',
    			'2'=>'通过'
    	);
    }
    
    public static function flag($flag)
    {
    	$arr=array(
    			array('id'=>'-1','name'=>'拒绝'),
    			array('id'=>'0','name'=>'未证'),
    			array('id'=>'1','name'=>'等待'),
    			array('id'=>'2','name'=>'通过'),
    	);
        if($flag=='-1'){
    		echo "<font color='red'>".$arr['0']['name']."</font>";
    	}
    	if($flag=='0'){
    		echo "<font color='red'>".$arr['1']['name']."</font>";
    	}
    	if($flag=='1'){
    		echo "<font color='green'>".$arr['2']['name']."</font>";
    	}
    	if($flag=='2'){
    		echo "<font color='blue'>".$arr['3']['name']."</font>";
    	}
    }
    public static function filterRecommend($flag)
    {
    	return array(
    			'1'=>'推荐',
    			'0'=>'非推',
    			
    	);
    }
    
    public static function filterstatistics()
    {
    	return array(
    			'0'=>'未完成',
    			'1'=>'完成',
    			 
    	);
    }
    
    public static function recommend($recommend)
    {
    	$arr=array(
    			array('id'=>'0','name'=>'非推'),
    			array('id'=>'1','name'=>'推荐'),
    			
    	);
        if($recommend=='0'){
    		echo "<font color='red'>".$arr['0']['name']."</font>";
    	}
    	if($recommend=='1'){
    		echo "<font color='blue'>".$arr['1']['name']."</font>";
    	}
    }
    
    public static function statistics($statistics)
    {
    	$arr=array(
    			array('id'=>'1','name'=>'完成'),
    			array('id'=>'0','name'=>'未完成'),
    			 
    	);
    	if($statistics=='0'){
    		echo "<font color='blue'>".$arr['1']['name']."</font>";
    	}
    	if($statistics=='1'){
    		echo "<font color='red'>".$arr['0']['name']."</font>";
    	}
    }
    
    public static function href($uid,$uname)
    {
    	$str="/verifyinfo/list/?id=".$uid."&username=".$uname;
    	echo  "<a href='$str' style='color:blue'; >资质详情</a>";
    }
    
    
    
    /*
     * 条件查询
     */
    public static function filterTypeFlag($type_flag)
    {
        return array(
            '-1'=>'拒绝',
            '1' => '等待',
            );
    }
    
    
    /*
     * 老师推荐查询
    */
    public static function filterIsRecommend($type_flag)
    {
        return array(
            '1' => '已推荐',
            '0' => '未推荐',
        );
    }
    
    /*
     * 格式化过长数据  5默认开课验证 6身份验证
     */
    public static function FormatLen($json,$type_id='5')
    {
        if($type_id=='5'){
            $url = json_decode($json, true);
             if (isset($url['stages_id'])) {
                echo $showstr = "<div style='width:550px ;height:60px; overflow:auto;'>$json</div>";
            } else {
                 
                $urlbefore = 'http://linwo.oss-cn-hangzhou.aliyuncs.com/';
                $keyinfo=array_values($url);
                $url= $urlbefore.$keyinfo['0'];
                $limit = "width='150'; height='100';";
                echo $showstr .= "<a href='$url' style='width:150px; height:100px'; ><img src='$url' " . $limit . "></a>";
            }
        }
        if($type_id=='6'){
            echo $showstr = "<div style='width:570px ;height:80px; overflow:auto;'>$json</div>";
        }
    }
    
    /*
     * 格式化显示图片
    */
    public static function FormatImg($str){
        $urlbefore = 'http://linwo.oss-cn-hangzhou.aliyuncs.com/';
        $url= $urlbefore.$str;
        $limit = "width='150'; height='100';";
        echo $showstr .= "<a href='$url' style='width:150px; height:100px'; ><img src='$url' " . $limit . "></a>";
    }
}
