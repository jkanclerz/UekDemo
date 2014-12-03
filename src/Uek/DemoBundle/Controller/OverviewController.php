<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OverviewController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UekDemoBundle:Overview:index.html.twig', array('name' => $name));
    }
}
