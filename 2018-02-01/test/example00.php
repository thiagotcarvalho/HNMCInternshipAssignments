<?php

class Example
{
	private $name;

	public function setName($name)
	{
		$this->name = $name;
	}

	public function getName()
	{
		return $this->name;
	}
}
$test = new Example();
$test->setName('XRAY');
$test->getName();