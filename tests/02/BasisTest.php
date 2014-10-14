<?php

class BasisTest extends TestBase
{
	protected function setup()
	{
		parent::setup(file_get_contents(ROOT_PATH . '/themes/02/Basis.php'));
	}

	protected function checkMethodValidityForCompareStrict()
	{
		if (!$params = $this->parsed_classes['compareStrict']->getParams()) {
			return false;
		}

		foreach ($params as $param) {
			if (!$param->default) {
				return false;
			}
			if ($param->name === 'a' && $param->default->value !== 1) {
				return false;
			}
			if ($param->name === 'b' && $param->default->value !== '1') {
				return false;
			}
		}

		if (!$stmts = $this->parsed_classes['compareStrict']->getStmts()) {
			return false;
		}

		foreach ($stmts as $stmt) {
			if ($stmt instanceof PhpParser\Node\Stmt\Return_) {
				$values = current(current($stmt)['expr']);
				if (($values['left']->name !== 'a') || ($values['right']->name !== 'b')) {
					return false;
				}
			}
		}

		return true;
	}

	protected function checkMethodValidityForCompareLoose()
	{
		if (!$params = $this->parsed_classes['compareLoose']->getParams()) {
			return false;
		}

		foreach ($params as $param) {
			if (!$param->default) {
				return false;
			}
			if ($param->name === 'a' && $param->default->value !== 0) {
				return false;
			}
			if ($param->name === 'b') {
				$val = current(current(current($param->default)))['parts'][0];
				if ($val !== 'false') {
					return false;
				}
			}
		}

		if (!$stmts = $this->parsed_classes['compareLoose']->getStmts()) {
			return false;
		}

		foreach ($stmts as $stmt) {
			if ($stmt instanceof PhpParser\Node\Stmt\Return_) {
				$values = current(current($stmt)['expr']);
				if (($values['left']->name !== 'a') || ($values['right']->name !== 'b')) {
					return false;
				}
			}
		}

		return true;
	}

	public function testCompareStrict()
	{
		if (!$this->checkMethodValidityForCompareStrict()) {
			throw new Exception('問題に不正な書き換えが行われています！！');
		}

		$resultText = <<<TEXT
【不正解】
1はinteger型（数値）、'1'はstring型（文字型）です。
`==`を利用した比較では型の情報は無視されて比較が行われます。
TEXT;
		$this->assertFalse(Basis::compareStrict(), $resultText);
	}

	public function testCompareLoose()
	{
		if (!$this->checkMethodValidityForCompareLoose()) {
			throw new Exception('問題に不正な書き換えが行われています！！');
		}

		$resultText = <<<TEXT
【不正解】
`0`と`false`は別の値のように見えますが、
`0`はinteger型の空の値、`false`はboolean型の空の値です。
`==`で比較する場合、型の比較は行われないので、`0`と`false`を比較すると、`空の値`と`空の値`の比較とみなされますが、
`===`で比較する場合は`0`と`false`の比較とみなされます。
TEXT;
		$this->assertTrue(Basis::compareLoose(), $resultText);
	}
}
