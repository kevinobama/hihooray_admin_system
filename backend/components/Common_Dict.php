<?php
/**
 * Created by Aptana studio.
 * User: Kevin Henry Gates III at Hihooray,Inc
 * Date: 2015/11/05  
 * Time: 05:38 PM */
namespace backend\components;
/**
 * 通用字典读取
 *
 * @author sunyong
 */
class Common_Dict{

    private $name = '';           //xml文件名
    private $key = null;          //key查找label
    private $parent_key = null;   //用父key查找下一级
    private $structure = 'tree';  //数据结构 (tree|single|root)  tree多维数组|single一维数组|root根数组
    //private $level = null;        //维数 (1|2|3)
    private $data = null;

    /**
     * xml统一获取入口
     *
     * @param String $name
     * @param Array $option
     * @example $this->get('area', array('parent_key'=>110000); 则取北京下面的市级城市
     * @example $this->get('area', array('structure'=>'single'); 则以单维数组取得所有省市县
     * @example $this->get('area', array('structure'=>'root'); 则取得所有省级城市
     * @example $this->get('area',array('key'=>110000)); 根据key找value
     */
    public function get($name, $config=array()) {
        if (!is_string($name) || !$name)
            return false;
        $this->name = $name;
        $this->deal_name();

        if (is_array($config) && $config) {
            $this->key = isset($config['key']) ? $config['key'] : null;
            $this->parent_key = isset($config['parent_key']) ? $config['parent_key'] : null;
            $this->structure = isset($config['structure']) ? $config['structure'] : 'tree';
            $this->level = isset($config['level']) ? $config['level'] : null;
        } else {
            return $this->data;
        }

        $this->deal_key();
        $this->deal_parent_key();
        $this->deal_structure();
        //$this->deal_level();

        return $this->data;
    }

    //memcache暂没加
    private function deal_name() {

        $filepath = APPLICATION_PATH . '/data/xml/' . $this->name . '.xml';
        if (!file_exists($filepath)) {
            throw new Exception('file is not exists .' . $filepath);
        }

        $xmlObject = simplexml_load_file($filepath);

        switch ($this->name) {
            /*
            case 'education':
                 $data = $this->other($xmlObject);
                break;
            case 'grade':
                 $data = $this->getMore($xmlObject);
                break;
            */
            case 'subject':
                $data = $this->getMore($xmlObject);
                break;
            case 'classification':
                $data = $this->getMore($xmlObject);
                break;
            default:
                $data = $this->other($xmlObject);
                break;
        }
        $this->data = $data;
    }

    private function deal_key() {
        if ($this->key!==null) {
            $data = $this->multi2single($this->data);
            if (is_array($this->key)) {
                $res = array();
                foreach ($this->key as $key) {
                    if (isset($data[$key])) {
                        $res[] = $data[$key];
                    }
                }
                if ($res) {
                    $this->data = $res;
                } else {
                    $this->data = null;
                }
            } else {
                if (isset($data[$this->key])) {
                    $this->data = $data[$this->key];
                } else {
                    $this->data = null;
                }
            }
        }
    }

    private function deal_parent_key() {
        if ($this->parent_key) {
            $this->data = $this->find_children($this->data, $this->parent_key);
        }
    }

    private function deal_structure() {
        if ($this->structure == 'single' && is_array($this->data)) {
            $this->data = $this->multi2single($this->data);
        } elseif ($this->structure == 'root' && is_array($this->data)) {
            $this->data = $this->multi2root();
        }
    }

    //多级读取
    private function getMore($xmlObj) {
        $data = array();
        foreach ($xmlObj as $level1) {
            $level1_key = (string) $level1['key'];
            $level1_text = (string) $level1['text'];
            $data[$level1_key] = array($level1_key => $level1_text);

            if (isset($level1->item)) {
                foreach ($level1->item as $level2) {
                    $level2_key = (string) $level2['key'];
                    $level2_text = (string) $level2['text'];

                    if (isset($level2->item)) {
                        $data[$level1_key]['children'][$level2_key] = array($level2_key => $level2_text);
                        foreach ($level2->item as $level3) {
                            $level3_key = (string) $level3['key'];
                            $level3_text = (string) $level3['text'];
                            $data[$level1_key]['children'][$level2_key]['children'][$level3_key] = $level3_text;
                        }
                    } else {
                        $data[$level1_key]['children'][$level2_key] = $level2_text;
                    }
                }
            }
        }
        return $data;
    }

    //地区
    private function getArea($xmlObj) {
        $data = array();
        //$i=0;
        foreach ($xmlObj as $level1) {
            $level1_key = (int) $level1['key'];
            $level1_text = (string) $level1['text'];
            $data[$level1_key] = array($level1_key => $level1_text);
            if (isset($level1->area)) {
                foreach ($level1->area as $level2) {
                    $level2_key = (int) $level2['key'];
                    $level2_text = (string) $level2['text'];
                    if (isset($level2->item)) {
                        $data[$level1_key]['children'][$level2_key] = array($level2_key => $level2_text);
                        foreach ($level2->item as $level3) {
                            $level3_key = (int) $level3['key'];
                            $level3_text = (string) $level3['text'];
                            $data[$level1_key]['children'][$level2_key]['children'][$level3_key] = $level3_text;
                        }
                    } else {
                        $data[$level1_key]['children'][$level2_key] = $level2_text;
                    }
                }
            }
        }
        return $data;
    }

    //其他
    private function other($xmlObj) {
        $data = array();
        foreach ($xmlObj as $val) {
            $key = (int) $val['key'];
            //$val = (array) $val;
            $val = (string) $val;
            $text = $val;
            $data[$key] = $text;
        }
        return $data;
    }

    private function multi2single($data) {
        static $single_data = array();
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $this->multi2single($value);
            } else {
                $single_data[$key] = $value;
            }
        }
        return $single_data;
    }

    private function multi2root() {
        $root_array = array();
        foreach ($this->data as $key => $value) {
            if (isset($value[$key]) && is_string($value[$key])) {
                $root_array[$key] = $value[$key];
            } elseif (is_string($value)) {
                $root_array[$key] = $value;
            }
        }
        return $root_array;
    }

    private function find_children($data, $parent_key) {
        static $children = array();
        foreach ($data as $key => $value) {
            if ($key != $parent_key) {
                if (is_array($value)) {
                    $this->find_children($value, $parent_key);
                }
            } else {
                if (is_array($value['children'])) {
                    foreach ($value['children'] as $key => $value) {
                        if (is_array($value)) {continue;
                            $children[$key] = $value;
                        } else {
                            $children[$key] = $value;
                        }
                    }
                }
            }
        }
        return $children;
    }

}
