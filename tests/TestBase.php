<?php

/**
 * PHPUnit application original base calss.
 *
 * @author qwintet
 */
class TestBase extends PHPUnit_Framework_TestCase
{
	/** @var ParsedClass[] */
	protected $parsed_classes = [];

	/**
	 * @param string $code
	 */
	protected function setup($code)
	{
		$parser = new PhpParser\Parser(new PhpParser\Lexer\Emulative);

		try {
			/** @var PhpParser\Node\Stmt\Class_[] $stmts */
			$stmts = $parser->parse($code);

			foreach ($stmts as $stmt) {
				/** @var PhpParser\Node\Stmt\ClassMethod[] $methods */
				$methods = $stmt->getMethods();

				foreach ($methods as $method) {
					$this->parsed_classes[$method->name] = new ParsedClass($method);
				}
			}
		} catch (PhpParser\Error $e) {
			echo 'Parse Error: ', $e->getMessage();
		}
	}
}

/**
 * Main classes modified checker.
 *
 * @author qwintet
 */
class ParsedClass
{
	/** @var string */
	private $name;

	/** @var PhpParser\Node\Param[] */
	private $params;

	/** @var array */
	private $stmts;

	/**
	 * @param \PhpParser\Node\Stmt\ClassMethod $method
	 */
	public function __construct(PhpParser\Node\Stmt\ClassMethod $method)
	{
		$this->name = $method->name;
		$this->params = $method->params;
		$this->stmts = $method->stmts;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return PhpParser\Node\Param[]
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @return array
	 */
	public function getStmts()
	{
		return $this->stmts;
	}
}
