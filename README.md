# Route for Laravel
 > 随着项目的开发，routes文件会越来越大，因此做了这个包。  

### 安装
> 包的版本还没处理，只能直接装这个

- composer
```
composer require bluegeek/route-for-laravel dev-master
```


### 配置

- App\Console\Kernel.php
```php
protected $commands = [
    ...
    \Waterloocode\Router\Console\Commands\MakeRoute::class,
    ...
];
```
- app.php
```
'providers' => [
    ...
    Waterloocode\Router\Providers\RouteServiceProvider::class,
    ...
],
```

### 使用
- artisan命令
     ```
     php artisan make:route HomeRoutes
     ```
    这会生成一个空的App\Http\Routes\HomeRoutes.php

    ```php
    <?php
    /**
    * 使用方式和原本的一样
    */
    namespace HomeRoutes;
    use Illuminate\Contracts\Routing\Registrar;
    class HomeRoutes
    {
    	public function map(Registrar $router)
    	{

    	}
    }
    ```
- 示例

```php
<?php
/**
* 使用方式和原本的一样
*/
namespace HomeRoutes;
use Illuminate\Contracts\Routing\Registrar;
class HomeRoutes
{
    public function map(Registrar $router)
    {
        $router->group(["prefix"=>"user"], function ($router) {
			$router->get("/",function(){
				dd("this is a user");
			});
        });
    }
}
```

- 性能  
生产环境可以生成路由缓存，这样就不会因为分割路由产生性能降低了。
```
php artisan route:cache
```
