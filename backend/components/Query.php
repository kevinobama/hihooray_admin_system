<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Query
 * QueryBuilder公共类
 * @author Administrator
 */
class Query extends CDbCommand{
    
    //获取最后执行的sql语句
    public function lastSql()
    {
        return strtr($this->text,$this->params);
    }
}
?>
