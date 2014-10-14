# 課題１：PHPの型について

PHPには型というデータを表すための定義が存在します。
型には下記のような種類が存在します。

* boolean
* string
* integer
* float
* array
* object
* callable
* null

## boolean

boolean型は真偽値と言われ、`true`、`false`の２値で表現します。  
値がbooleanであるかどうかを評価するには`is_bool`関数を利用します。

```php
$var1 = true;
is_bool($var1); // -> true
$var2 = null
is_bool($var2); // -> false
```

## string

string型は文字列を表す型です、文字列は`''`または`""`で括って表現します。

```php
$var1 = 'hello';
var_dump($var1); // -> string(5) "hello"
$var2 = "true";
var_dump($var2); // -> string(4) "true"
```

値がbooleanであるかどうかを評価するには`is_string`関数を利用します。

```php
$var1 = 'hello';
is_string($var1); // -> true
$var2 = true;
is_string($var2); // -> false
```

## integer

integer型は整数を表す型です、`0`,`1`,`10`,`-1`,`-10`のように表現します。  
文字列で整数を定義した場合、その値が計算などの式で利用されると暗黙的にinteger型として評価されて処理が行われます。  
integer型は省略してintと書かれることがあります（殆どの場合、intと省略される）。

```php
$var1 = 100;
var_dump($var1); // -> int(100)
$var2 = '200';
var_dump($var2); // -> string(3) "200"

// integer型とstring型を足し算した場合、string型の文字が整数であれば、それはinteger型として扱われる
var_dump($var1 + $var2); // -> int(300)
```

値がintegerであるかどうかを評価するには`is_int`関数を利用します。

```php
$var1 = 100;
is_int($var1); // -> true
$var2 = '200';
is_int($var2); // -> false
```

もし、string型、integer型関係なく数値であることを確認したい場合は`is_numeric`関数を利用します。  
但し、`is_numeric`関数は後述するfloat型でも`true`を返すので注意が必要です。

```php
is_numeric('100'); // -> true

// float型もtrueを返す
is_numeric(1.1); // -> true
is_numeric('1.1'); // -> true
```

## float

integer型は少数を表す型です、`1.0`,`0.1`,`1.34`,`-10.56`のように表現します。  
文字列で少数を定義した場合、その値が計算などの式で利用されると暗黙的にfloat型として評価されて処理が行われます。

```php
$var1 = 3.14;
var_dump($var1); // -> float(3.14)
$var2 = '1.4';
var_dump($var2); // -> string(3) "1.4"

// float型とstring型を足し算した場合、string型の文字が少数であれば、それはfloat型として扱われる
var_dump($var1 + $var2); // -> float(4.54)
```

値がintegerであるかどうかを評価するには`is_float`関数を利用します。

```php
$var1 = 3.14;
is_float($var1); // -> true
$var2 = '1.4';
is_float($var2); // -> false
```

## array

array型は複数の値を格納した一つの集合です。  
`array(0,1,2,3)`、または`[0,1,2,3]`（php5.4~）のように表現します。  
  
配列に設定された値はキーとバリューのペアで配列内に格納されます。  
（`キー => バリュー`のように表現される。）  
例えば、`[0,1,2,3]`と定義した配列は`[0 => 0, 1 => 1, 2 => 2, 3 => 3]`と同じです。  
  
次のように配列を定義することでキーを独自に指定することが出来ます `['color' => 'green', 'status' => 'ok']`。

```php
$var1 = [0,1,2];
var_dump($var1); // -> array(3) { [0] => int(0), [1] => int(1), [2] => int(2) }
$var2 = ['first' => 1, 'second' => 2, 'third' => 3];
var_dump($var1); // -> array(3) { ["first"] => int(1), ["second"] => int(2), ["third"] => int(3) }
```

値がarrayであるかどうかを評価するには`is_array`関数を利用します。

```php
$var = [0,1,2];
is_array($var); // ->true
```

## object

object型は処理、データの集合でPHPでは`class`をインスタンス化したものがobject型として扱われます。

```php
$var = new stdClass;
var_dump($var); // -> object(stdClass)#1 (0) {}
```

値がobjectであるかどうかを評価するには`is_object`関数を利用します。

```php
$var = new stdClass;
is_object($var); // ->true
```

## callable

callable型は関数（function）を表す型です。  
値が関数であるかどうかを評価するには`is_callable`関数を利用します。  

```php
is_callable(function() { ... }); // -> true
```

## null

`null`は値が不明確な状態を表す型です。  
（正確には`null`は型ではありませんが便宜上型として説明します。）  
例えば、変数が宣言されたが何の値も代入されない場合、PHPはその型を`null`と判定します。

```php
// 変数を宣言したが、値が代入されれいない。
$var;
var_dump($var); // -> NULL
```

上記以外にも関数が何の戻り値も返さない場合、  
その関数の戻り値は何も無い（≒何が返されるか分からない）と判断され`null`となります。

```php
function foo()
{
    echo 'foo';
}

// 関数fooは戻り値が無い
$var = foo();
var_dump($var); // -> NULL
```

値がnullかどうかを評価するには`is_null`関数を利用します。

```php
$var;
is_null($var); // -> true
```
