<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AboutController extends Controller
{
    public function indexAction()
    {
        return $this->render(
			'UekDemoBundle:About:index.html.twig',
			array(
				'name' => 'Jakub Kanclerz',
				'birthdate' => new \Datetime('1999-11-11'),
			)
		);
    }
}
