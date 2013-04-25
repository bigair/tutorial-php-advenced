除錯
-----------

print_r 與 var_dump
===================

* print_r 列出較簡明的內容，但 null 及 false 則不會印出資訊
* var_dump 列出較詳細的資訊

Xdebug
======

### 安裝

* phpbrew ext install xdebug
* pecl install xdebug

### 顯示完整錯誤

* 讓錯誤可以被追蹤。
* 視覺化

### IDE 整合 Xdebug 來設置中斷點

### Log

如何有效率的 log ？

https://github.com/Seldaek/monolog

錯誤管理
----

exit 與 die
===========

不要隨便找個地方就死了，會造成別人的困擾。

* http://www.jaceju.net/blog/archives/1121/
* die  & exit
* resource 沒有釋放
* web gc 不見得會立刻啟動

### set_error_handler() & set_exception_handler()

* log error

### register_shutdown_function()

* 在結束時會被呼叫
* release resource
* register resource

### fastcgi_finish_request()

should be used instead of register_shutdown_function() and exit()


