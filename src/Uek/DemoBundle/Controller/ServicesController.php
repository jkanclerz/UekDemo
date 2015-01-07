<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ServicesController extends Controller
{
	public function helloAction()
	{
		$storage = $this->get('uek_demo.storage.session');
		$storage->setData('my.super.data', 'My New answer');
		$mailer = $this->get('uek_demo.mailer');
		echo $mailer->sendEmail();
		die;
	}
	
	public function showSessionAction()
	{
		$storage = $this->get('uek_demo.storage.session');
		echo $storage->getData('my.super.data');
		die;
	}
}
