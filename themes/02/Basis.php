<?php

/**
 * PHPの基本文法について学習するためのクラスです。
 * 各メソッドのコメントを元に処理を実装してみましょう。
 *
 * @author qwintet
 */
class Basis
{
	/**
	 * 引数$`$a`には数値の1が与えられます。
	 * 引数`$b`には文字の1が与えられます。
	 *
	 * コメントアウトされている処理`return ($a === $b);`、`return ($a == $b);`のうちfalseを返す処理のコメントを外しなさい。
	 *
	 * @param int $a
	 * @param string $b
	 * @return bool
	 */
	public static function compareStrict($a=1, $b='1')
	{
		// return ($a === $b);
		return ($a == $b);
	}

	/**
	 * 引数$`$a`には数値の0が与えられます。
	 * 引数`$b`には文字のfalseが与えられます。
	 *
	 * コメントアウトされている処理`return ($a === $b);`、`return ($a == $b);`のうちfalseを返す処理のコメントを外しなさい。
	 *
	 * @param int $a
	 * @param bool $b
	 * @return bool
	 */
	public static function compareLoose($a=0, $b=false)
	{
		return ($a === $b);
		// return ($a == $b);
	}
}
