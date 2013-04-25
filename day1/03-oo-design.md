物件導向開發
----------

## 封裝變化的部份

## 少用繼承，多用合成

<?php

class Model
{
    protected $_db;
}

?>

## 針對介面寫程式，而不是針對實作寫程式

<?php

$db = new mysqli();

$db = new Db();

?>

## 將物件之間解耦

* Blog && MySQL
* PageBulder && Smarty

## 迪米特法則 (LoD)

* 用戶端知道的越少越好。
* 儘可能把介面隱藏,只留下用戶端需要知道的。

## SOLID

### 單一職責 (Single Responsibility Principle)

* 只為一個目的來修改類別

### 開放與關閉 (Open-Closed Principle)

* 對擴充開發，對修改關閉

### 子類別取代 (Liskov’s Substitution Principle)

* 子類別要可以取代父類別

### 介面分隔 (The Interface Segregation Principle)

*

### 相依性倒轉 (The Dependency Inversion Principle)

* 不將特定的類別寫死在程式碼裡

## setter & getter

* 不要為每個類別屬性都製作 setter & getter

## 程式碼語意

* 方法要放在對的類別上
* 有意義的名稱

## 針對領域，而不是資料結構

儘可能用跟領域相關的名詞來命名類別及變數，而不是用資料結構來命名。

錯誤的設計：

<?php
$rootNode = new Node('root');
$nodes = $rootNode->getTree();
$articles = $root->getDataByNodes($nodes);
?>

Node 是什麼？

<?php
$root = new Category('root');
$category = $root->getCategory('test');
$articles = $root->getArticlesFrom($category);
?>

## 保持輕巧，不要過度設計

* 不要為了物件導向而物件導向
* 先看看手冊有沒有好用的解決方案





