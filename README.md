# MemorialDay
一个可以在指定日期让你的网站变成黑白模式的纪念日插件，本插件兼职负责添加`theme-color`使得Android Chrome通知栏、标签栏变色。

## 为啥要搞这玩意 ##
> What is dead may never die.

以此来缅怀那些逝去的生命。

## 使用方法 ##
将`MemorialDay.php`放到`wp-content/plugins`，后台中启用，设置日期和theme-color即可

## 效果图 ##
![](http://i.imgur.com/MwcBC39.jpg)

## Q&A ##
### theme-color是什么，我该怎么设置 ###
此项值用来控制Android Chrome通知栏和标题栏变色，如果你的主题不带类似下面这样的头部：
`<meta name="theme-color" content="#299981">`
那就填一个比较适合你的主题的颜色吧，正常的时候通知栏和标题栏就会变色啦；
如果你的主题带这样的头部，那.....不好意思，我不知道哪个过滤器能够更改这个meta...而这个`theme-color`又是在上面的生效...所以在`header.php`中删掉这个meta是暂时的解决方案。
我暂时没有找到两全其美的解决方案....
如果把这一项留空，那么就是不设置这个meta啦~
### 纪念日时Firefox最上面有一个横条 ###
我也不知道为啥，Chrome就没有...

### License ###
GPLv2
