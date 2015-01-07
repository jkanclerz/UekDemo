<?php
namespace Uek\DemoBundle\Storage;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SessionStorage
{
	protected $session;
	
	public function __construct(SessionInterface $session)
	{
		$this->session = $session;
	}
	
	public function getData($key)
	{
		return $this->session->get($key);
	}
	
	public function setData($key, $data)
	{
		$this->session->set($key, $data);
	}
}