# PHPの基礎文法

プログラミングの基礎的な文法を学ぶとともに、PHP独自の挙動を理解する。

## if文

処理を分岐させるための基本的な方法です、以下の様な記述をします。  
`if (条件式1) { 処理 } else if (条件式2) { 処理 } else { 処理 }`  
  
`if`は条件式が`true`か`false`かを判定して処理を分岐させます。  

```php
<?php
$var = 500;

// 以下の場合、'var over 100'と出力されます
if ($var > 100) {
    echo 'var over 100';
} else {
    echo 'var less than 100';
}

// 複数の条件を判定することも可能です
if ($var === 0) {
    // 何かの処理
} elseif ($var > 10) {
    // 何かの処理
} elseif ($var > 50) {
    // 何かの処理
} elseif ($var > 100) {
    // 何かの処理
} else {
    // 何かの処理
}

// else, elseifは省略することが出来ます
if ($var) {
    // 何かの処理
}
```

### ifの評価

[課題01](https://github.com/qwintet-dev/new-emproyee-training/tree/master/themes/01)で`true`,`false`は`boolean型`と学習しましたが、`if`で評価出来るものは`boolean型`に限定されません。  
`if`で評価した際にそれが`true`と判定されるか`false`と判定されるかは以下の表から確認して下さい。

値|評価結果|備考
--- | --- | ---
null|false|
false|false|
0|false|
1|true|
'0'|false|string型の0
'a'|true|
array()|false|空の配列
(object)null|true|空のオブジェクト
function() {}|true|空の関数

## 等価演算

PHPには値が等価であるかどうかを確認するために`==`と`===`の２つの方法が用意されています。  
違いは__型を意識して比較する__かどうかです。  
  
`==`と`===`で評価した場合の差異は以下の表から確認して下さい。

左辺値|右辺値|`==`|`===`
--- | --- | --- | ---
0|0|true|true
0|'0'|true|false
0|false|true|false
1|true|true|false

パフォーマンスの観点や正確に値を評価するという観点からも`===`の利用が推奨されますが、  
以下のケースでは`==`での評価を利用したほうがいいでしょう。  

* MySQLから取得した数値の評価（設定によってカラムの数値型の値がint型として扱われる場合と、string型として扱われるケースが存在する）

## 論理演算

論理演算とは２値の値の結合結果によって真偽値を決定する、または真偽値を反転させる演算です…  
と書くと難しく聞こえるので、以下の例を見てどんなものか理解して下さい。

```php
<?php
if (true && true) {
    echo 'True';
}

if (true || false) {
    echo 'True';
}

if (true && false) {
    echo 'False';
}

if (false || false) {
    echo 'False';
}

if (!true) {
    echo 'False';
}

if (!false) {
    echo 'true';
}
```

論理演算には`&&`と`||`、または`!`利用して記述します。  
`&&`は右辺と左辺が`true`の場合`true`を返し、そうでない場合`false`を返します。  
`||`は右辺か左辺が`true`の場合`true`を返し、そうでない場合`false`を返します。  
`!`は`!`演算子の後ろに登場する式の真偽値を反転させます。  
例えば`!true`は`false`になり、`!false`は`true`になります。

> 論理演算には他に`AND`,`OR`,`XOR`が存在しますが、利用頻度が低いためここでは説明しません。

# 課題を解いてみよう！

課題を解く前に以下のファイルを修正しておいて下さい。

* `phpunit.xml`に以下の行を追記

```diff
 <?xml version="1.0" encoding="utf-8" ?>
 <phpunit bootstrap="tests/bootstrap.php" colors="true">
     <testsuites>
         <testsuite>
             <directory>./tests/01/</directory>
+            <directory>./tests/02/</directory>
         </testsuite>
     </testsuites>
 </phpunit>
```
