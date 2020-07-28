# PHP Route

### 项目介绍
一个轻量级的php route库，提供多种类型路由，使用简单。


### 支持
+ GET
+ POST
+ HEAD
+ OPTIONS
+ PUT
+ DELETE
+ PATCH
+ 路由分组
+ Facade

### 安装
git clone xxx

cd 项目目录

composer dump-autoload


### 普通路由定义
```php

include_once __DIR__.'/vendor/autoload.php';
use Route\Route;
// p1路由规则,p2路由地址 
Route::get('home','home');
$url = $_SERVER['REQUEST_URI'];
$res =  Route::match($url,'GET');
if ($res) {
    echo "匹配成功";
}else{
    echo "匹配失败";
}

```
### 定义参数路由
```php

include_once __DIR__.'/vendor/autoload.php';
use Route\Route;
// 必须参数 :xx
Route::get('home/:id','home');
// 可选参数 [xxx]
Route::get('api/[action]','api/Index');
$url = $_SERVER['REQUEST_URI'];


// 匹配成功返回数组 
// 数组第一个元素是路由参数
// 第二个是RouteItem对象
// 匹配失败返回 false
$res =  Route::match($url,'GET');

if ($res) {
    /*** @var \Route\Logic\RuleItem $route */
    $route = $res[1];
    // 匹配成功将路由参数变量替换至路由地址中
    // 如$res[0] = ['id' => 'id']
    // 路由地址 = api/:id
    // 结果 api/id
    // 共支持 :key、.key、key.
    echo $route->getRoute($res[0]);
}else{
    echo '匹配失败';
}

```


### 路由分组
```php

include_once __DIR__.'/vendor/autoload.php';
use Route\Route;
Route::group('api',function (){
    Route::get('home','home');
});
// 等价 Route::get('api/home','home');

$url = $_SERVER['REQUEST_URI'];
$res =  Route::match($url,'GET');
if ($res) {
    echo "匹配成功";
}else{
    echo "匹配失败";
}

```

### 路由地址 前缀 后缀
```php

include_once __DIR__.'/vendor/autoload.php';
use Route\Route;
Route::group('api',function (){
    Route::get('home','/home')->setPrefix('/homePrefix')->setSuffix('/homeSuffix');
})->setPrefix('/groupPrefix')->setSuffix('/groupSuffix');

$url = $_SERVER['REQUEST_URI'];
$res =  Route::match($url,'GET');
if ($res) {
    /*** @var \Route\Logic\RuleItem $route */
    $route = $res[1];
    echo $route->getRoute();
    //输出 /groupPrefix/homePrefix/home/groupSuffix/homeSuffix
}else{
    echo '匹配失败';
}

```
