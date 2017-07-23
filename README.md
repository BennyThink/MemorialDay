# MemorialDay
一个可以在指定日期让你的网站变成黑白模式的纪念日插件，本插件兼职负责添加`theme-color`使得Android Chrome通知栏、标签栏变色。
**支持WordPress与Typecho**

## 为啥要搞这玩意 ##
> What is dead may never die.

以此来缅怀那些逝去的生命。

## 使用方法 ##
### WordPress ###
切换到WordPress分支，将`MemorialDay.php`放到`wp-content/plugins`，后台中启用激活即可
### Typecho ###
切换到Typecho分支，克隆整个仓库，将整个文件夹放到`usr/plugins`，确保文件夹名字是`MemorialDay`，到后台中启用激活即可。

## 效果图 ##
* WordPress
![](http://i.imgur.com/MwcBC39.jpg)
* Typecho
![](http://i.imgur.com/GJ7C1lG.jpg)

## Q&A ##
### 默认纪念日？ ###
默认在06-04和07-13网站将会变成黑白。
### theme-color是什么，我该怎么设置 ###
此项值用来控制Android Chrome通知栏和标题栏变色，通过这样一个meta：
`<meta name="theme-color" content="#299981">`
在纪念日的时候，这项设置是不会生效的。此项数值将会变成黑白色使得和整体页面更搭配；
非纪念日的时候，如果此项留空，那么将会保持原来的meta；如果不留空，那么将会显示你设置的meta。
所以总结就是，如果你的主题带meta theme-color，那么把这项留空；
如果你的主题不带meta theme-color，你还想设置个theme-color，那就设置吧。

### 纪念日时Firefox最上面有一个横条 ###
我也不知道为啥，Chrome就没有...（WordPress）

### License ###
GPLv2
