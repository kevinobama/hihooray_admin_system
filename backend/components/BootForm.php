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
 * Description of BootForm
 * FormBuser_ider
 * @author Administrator
 */
Yii::import('bootstrap.widgets.*');
class BootForm extends TbForm{
    
    public static function createForm($config, $model, $options = array())
    {
        $class = __CLASS__;
        if(empty($options)){
            $options = array(
                'class'=>'TbActiveForm',
                'htmlOptions'=>array('class'=>'well'),
	        'type'=>'inline', //'inline','horizontal','vertical'
            );
        }
        

        $form = new $class($config, $model);
        $form->activeForm = $options;

        return $form;
    }
}

?>
