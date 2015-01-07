<?php
namespace Uek\DemoBundle\Mailer;

class Mailer
{
	protected $nameProvider;
	protected $email;
	
	public function __construct(
		$nameProvider,
		$email
	) {
		$this->nameProvider = $nameProvider;
		$this->email = $email;
	}
	
	public function sendEmail()
	{
		return sprintf(
			'I am sending email to %s on address: %s',
			$this->nameProvider->getName(),
			$this->email
		);
	}
}