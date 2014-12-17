<?php

namespace Uek\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FeedType extends AbstractType
{
	public function buildForm(
		FormBuilderInterface $builder,
		array $options
	) {
		$builder
			->add('title')
			->add('content')
		;
	}

	public function getName()
	{
		return 'uek_feed';
	}
}