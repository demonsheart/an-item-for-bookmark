### 程序简介
> 构建了一个书签收藏夹
>![picture](https://github.com/demonsheart/an-item-for-bookmark/blob/master/architecture.png?raw=true)
### 程序使用说明
>1.	laravel5.5环境安装 [环境参考](https://learnku.com/docs/laravel/5.5/installation/1282)
>2.	软件打包
>3.	安装composer之后在项目根目录下使用composer install命令安装vendor目录
>4.	Database目录下必须有factories、migrations、seeds目录
>5.	必须先配置.env文件，链接数据库、填写key（php artisan key:generate）
>6.	必须先建表（建议使用php artisan migrate）
>7.	如果第一次建表，则需要先执行php artisan migrate:install
>8.	本项目的缺陷在于mail函数不能真正的发送邮件（可能与防火墙、配置、协议问题暂时无法解决），可在如下目录中查看邮件laragon>bin>sendmail>output
>   8.具体思路查看[docx](https://github.com/demonsheart/an-item-for-bookmark/blob/master/%E4%B9%A6%E7%AD%BE%E6%94%B6%E8%97%8F%E5%A4%B9.docx)

### 更新
>1. 将纯sha1()换成了laravel带的Crypt::encrypt()以及Crypt::decrypt()配合验证密码，提高了安全性。

### 在线测试
> [书签收藏夹首页](http://ibookmark.xyz)

### 状态
暂不维护

