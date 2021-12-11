<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

![Image text](https://raw.github.com/whitexiong/lavuei/master/public/images/lavuei.png)

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Lavuei

> 基于 Laravel8 实现的开源博客， 其用到的技术栈都是目前最新也是入门最容器的技术栈，并且在这个全栈框架中我们使用 InertiaJs (惯性) 来当做胶水语言而 Vue 在项目中退化为了纯视图层。

- Laravel Jetstream

> Laravel Jetstream 是一个设计精美的 Laravel 应用程序入门套件，为您的下一个 Laravel 应用程序提供了完美的起点。 Jetstream 为您的应用程序的登录、注册、电子邮件验证、两因素身份验证、会话管理、通过 Laravel Sanctum 提供的 API 以及可选的团队管理功能提供实现。

- Tailwind CSS

>  前端框架采用  Tailwind CSS 高度可定制化组件依靠 class 就能很好的设计出我们想达到的目的， 可通过在线编辑器查看 https://play.tailwindcss.com/

- InertiaJs

> 惯性JS 当做胶水语言帮助 Laravel 与 Vue 进行交互而 Laravel 中的路由非常的优秀我们可以省去 Vue 路由的部分而快速进行全栈开发

- MavonEditor

> 一款开箱即用的基于 vue 的 Markdown 编辑器目前项目中采用最新的 vue3 beta 版本

## 目录结构

> 本项目采用 MVC 方式，可采用 service 层逻辑处理，后续加入存储模式,严格遵守单元测试,代码上传后采用 jenkins 持续集成。

## 环境部署

> laravel sail 环境一键安装  laravel8 + php8.1 （注意 sail 环境需要在 WSL2 中使用）
> 使用阿里源安装 composer

    composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/

#### 注意环境中已经配置为 PHP8.1 版本并且在可使用 XDEBUG 进行调试

#### 上传文件中权限问题在 .env 中添加

    # uid
    WWWUSER=1000
    # 所属用户组
    WWWGROUP=1000

### 起步

    git clone git@github.com:whitexiong/lavuei.git

> cp .env.example .env

    composer install

> 进入目录

    alias sail='bash vendor/bin/sail'
    sail up -d
    sail build --no-cache  # 改了dockefile 文件后需要重新编译
    sail shell # 进入 shell 环境
    php artisan migrate

> 启动前端

    npm install && npm run dev
    sail npm run watch-poll  # 热重启

> 实现功能

- 用户管理
- 文章管理
- Markdown 编辑器集成
- 标签管理
- 分组管理
- 权限认证
- 评论系统


### 创建 policy 策略

    php artisan make:policy UserPolicy --model=User

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
