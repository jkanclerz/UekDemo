<?php
namespace Uek\DemoBundle\MyName;

class NameProvider
{
	protected $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function getName()
	{
		return $this->name;
	}
}