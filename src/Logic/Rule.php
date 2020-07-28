<?php
/**
 * Created by PhpStorm.
 * @Author: 天上
 * @Time  : 2020/5/31 16:12
 * @Email : 30191306465@qq.com
 */

namespace Route\Logic;


abstract class Rule{

    /**
     * 路由参数
     * @var array
     */
    protected $options = [];

    /**
     * 设置路由参数
     * @param string $name
     * @param        $val
     * @return $this
     */
    public function setOptions(string $name,$val){
        $this->options[$name] = $val;
        return $this;
    }

    /**
     * 获取路由参数
     * @param string $name
     * @param null   $default
     * @return array|mixed|null
     */
    public function getOptions(string $name = '',$default = null)
    {
        if ($name === '')
            return $this->options;
        return $this->options[$name] ?? $default;
    }

    /**
     * 设置路由请求类型
     * @param string $method
     * @return $this
     */
    public function setMethod(string $method){
        $this->setOptions('method',strtolower($method));
        return $this;
    }

    /**
     * 获取路由请求类型
     * @return string|null
     */
    public function getMethod(){
        return $this->getOptions('method');
    }

    /**
     * 设置前缀
     * @param string $str
     * @return $this
     */
    public function setPrefix(string $str){
        $this->setOptions('prefix',$str);
        return $this;
    }

    /**
     * 获取前缀
     * @return string
     */
    public function getPrefix(): string {
        return $this->getOptions('prefix','');
    }

    /**
     * 设置后缀
     * @param string $str
     * @return $this
     */
    public function setSuffix(string $str){
        $this->setOptions('suffix',$str);
        return $this;
    }

    /**
     * 获取后缀
     * @return string
     */
    public function getSuffix(): string{
        return $this->getOptions('suffix','');
    }
}