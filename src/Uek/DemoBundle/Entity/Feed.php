<?php

namespace Uek\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table()
 */
class Feed 
{
	/**
	 * @ORM\Column(type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;
	
	/**
     * @ORM\Column(type="string", length=50)
     */
	protected $title;
	/**
     * @ORM\Column(type="text")
     */
	protected $content;
	
	/**
     *  @ORM\OneToOne(targetEntity="Uek\DemoBundle\Entity\Image")
     */
	protected $image;
	
	/**
     * @ORM\ManyToMany(targetEntity="Uek\DemoBundle\Entity\Tag")
     * @ORM\JoinTable()
     */
	protected $tags; 
}