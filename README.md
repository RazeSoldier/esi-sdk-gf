# esi-sdk-gf
用于访问晨曦服务器ESI的SDK

## 安装
```shell
composer require razesolder/esi-sdk-gf
```

## 兼容性
本库设计在PHP 7.4和8.0版本上运行

## 功能
* **提供一个访问令牌获取器**
* **ESI各种API和对应的结果模型类**

## 使用
### ESI分页
有些接口可以分页。你可以通过检查API实现类有没有实现`Pageable`接口来判断支不支持分页。

在调用ESI后使用`$api->getMaxPages()`获得总页数。在调用ESI前使用`$api->setPage(2)`设置此次请求的页数。

例如：
```php
use RazeSoldier\SerenityEsi\Api\Assets\CharacterAssets;

$request = CharacterAssets::latest(1000);
$request->setAccessToken('xxx');
$request->get();
$maxPage = $request->getMaxPages(); // int(5) 获得总页数

$otherRequest = CharacterAssets::latest(1000);
$otherRequest->setAccessToken('xxx');
$otherRequest->setPage(4); // 设置页数
```

### 使用访问令牌获取器
本库提供了一个访问令牌获取器用来根据刷新令牌和Scope来查询访问令牌

例如：
```php
use RazeSoldier\SerenityEsi\Api\Login\AccessTokenGetter;

$refreshToken = 'aaabbbccc';
$scopes = ['esi-characters.read_contacts.v1'];
$getter = AccessTokenGetter::newInstance($refreshToken, $scopes);
$model = $getter->get(); // AccessTokenGetter::get()返回一个AccessToken模型对象
var_dump($model->refresh_token); // string('aaabbbccc')
var_dump($model->access_token); // string('adadcaeaxz1')
```
### 使用ETag来检查HTTP缓存
本库允许你选择使用或不使用ETag来检查HTTP缓存。

如果你选择使用ETag来检查HTTP缓存，本库提供了`EsiApi::getETag()`方法
来获得调用一个ESI后，其响应的etag值。你可以在后续请求里，通过`EsiBase::setETag()`方法
在该次请求里使用你在上一个请求获得的etag值。
调用`EsiApi::get()`后，你可以通过`EsiBase::resourceIsNotModified()`来检查服务器的资源是否变更；
如果返回`TRUE`，说明资源未变更，反之亦然。

注意：你应该在你的程序里负责编写数据缓存逻辑，本库没有提供数据缓存服务，只提供检查HTTP缓存的功能。
（在使用`EsiBase::setETag()`方法后的请求里，如果资源未变更，`get()`将返回一个NULL值）

例如：
```php
use RazeSoldier\SerenityEsi\Api\Character\CharacterPublicInformation;

$request = CharacterPublicInformation::latest(1000);
$request->get();
$etag = $request->getETag(); // 必须在调用get()后调用getETag()

$otherRequest = CharacterPublicInformation::latest(1000);
$otherRequest->setETag($etag); // 在get()前调用setETag()才会在本次请求检查HTTP缓存
$resp = $otherRequest->get();

var_dump($resp); // NULL
var_dump($otherRequest->resourceIsNotModified()); // true
```

## 许可证
该程序是开源的。你可以根据自由软件基金会发布的GNU通用公共许可证版本2（或更高的版本）的条款
重新分发和/或修改它。  
分发该程序是希望它会有用，但没有任何保证。甚至没有对适销性或特定用途适用性的暗示保证。  
你应该已经与该程序一起收到了GNU通用公共许可证的副本。

## 架构
_(下面列出的类名均在`RazeSoldier\SerenityEsi`名字空间下)_  
本库以`EsiService`为中心，可以从这个核心类使用到本库所有的API。

或者你也可以选择具体的API实现。具体API实现位于`RazeSoldier\SerenityEsi\Api`名字空间下。