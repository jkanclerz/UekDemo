<?php

namespace Uek\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Uek\DemoBundle\Form\Type\FeedType;
use Uek\DemoBundle\Entity\Feed;
use Symfony\Component\HttpFoundation\Request;

class FeedController extends Controller
{
	public function indexAction()
	{
		$feedRepo = $this->getDoctrine()->getManager()
			->getRepository('UekDemoBundle:Feed')
		;
		$feeds = $feedRepo->findAll();
		
		return $this->render(
			'UekDemoBundle:Feed:index.html.twig',
			array(
				'feeds' => $feeds
			)
		);
	}
	
	public function createAction(Request $request)
	{	
		$feed = new Feed();
		$form = $this->createForm(
			new FeedType(),
			$feed
		);
		
		if (
			$request->isMethod('POST')
			&& $form->handleRequest($request)
			&& $form->isValid()
		) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($feed);
			$em->flush();
		}		
		
		return $this->render(
			'UekDemoBundle:Feed:create.html.twig',
			array(
				'form' => $form->createView()
			)
		);
	}
}