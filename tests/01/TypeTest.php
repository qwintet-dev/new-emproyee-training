<?php

class TypeTest extends PHPUnit_Framework_TestCase
{
	public function testGetBoolean()
	{
		$this->assertTrue( is_bool(Type::getBoolean()) );
	}

	public function testGetInteger()
	{
		$this->assertTrue( is_int(Type::getInteger()) );
	}

	public function testGetFloat()
	{
		$this->assertTrue( is_float(Type::getFloat()) );
	}

	public function testGetString()
	{
		$this->assertTrue( is_string(Type::getString()) );
	}

	public function testGetArray()
	{
		$this->assertTrue( is_array(Type::getArray()) );
	}

	public function testGetObject()
	{
		$this->assertTrue( is_object(Type::getObject()) );
	}

	public function testGetFunction()
	{
		$this->assertTrue( is_callable(Type::getFunction()) );
	}
}
