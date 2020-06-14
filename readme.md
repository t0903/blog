### 创建项目
composer create-project --prefer-dist laravel/laravel blog "5.8.*"

### 创建模型
php artisan make:model Model\User

### 创建控制器
php artisan make:controller UserController

### 创建中间件
php artisan make:middleware IsLogin