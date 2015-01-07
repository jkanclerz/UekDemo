<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Jkanclerz\Component\Feed\Repository\FeedRepository;

class FeedController extends Controller
{
    public function indexAction()
    {
		$path = $this->get('kernel')->getRootDir();
		$path .= '/../var/feed.json';
		$feedRepo = new FeedRepository($path);
		
        return $this->render(
			'UekDemoBundle:Feed:feeds.html.twig',
			array(
				'name' => 'Jakub Kanclerz',
				'feeds' => $feedRepo->findAll(),
			)
		);
    }
}
