<?php
/**
 * Created by PhpStorm.
 * @Author: 天上
 * @Time  : 2020/7/28 19:29
 * @Email : 30191306465@qq.com
 */

namespace Route;


use Route\Logic\RuleGroup;
use Route\Logic\RuleItem;

/**
 * Class Route
 * @package Route
 * @mixin \Route\Logic\Route
 * @method RuleItem rule(string $name,$route,string $method = "*") static    定义一个路由
 * @method RuleItem post(string $name,$route) static    定义POST路由
 * @method RuleItem get(string $name,$route) static     定义GET路由
 * @method RuleItem put(string $name,$route) static     定义PUT路由
 * @method RuleItem patch(string $name,$route) static   定义PATCH路由
 * @method RuleItem options(string $name,$route) static 定义OPTIONS路由
 * @method RuleItem head(string $name,$route) static    定义HEAD路由
 * @method RuleItem delete(string $name,$route) static  定义DELETE路由
 * @method RuleGroup group($name,$route = null) static  定义路由组
 * @method array|bool match(string $url,string $method) static  匹配路由

 */
class Route{

    private static $instance;


    protected function __construct(){

    }

    public static function getInstance(){
        if (!self::$instance){
            self::$instance =  new \Route\Logic\Route();
        }
        return self::$instance;
    }


    public function __call($name, $arguments){
        return call_user_func_array([self::getInstance(),$name],$arguments);
    }

    public static function __callStatic($name, $arguments){
        return call_user_func_array([self::getInstance(),$name],$arguments);
    }
}