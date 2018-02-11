常见的几种实现
1、以父ID实现的无限分类
使用递归算法。表中一个字段id,一个字段pid(父id).
这样可以根据where id =pid 来查出上一级内容，运用递归至顶层。

2、以全路径实现的无限分类
表中有一字段path:1，2，3.使用where path like '1,2,3,%'
order by cpath asc 查出它及子类的列表

