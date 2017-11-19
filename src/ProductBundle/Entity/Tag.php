<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag
{
  /**
   * @ORM\Column(type="integer", name="tag_id")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $tagId;

  /**
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * Many Tags have many products
   * @ORM\ManyToMany(targetEntity="Product", mappedBy="tags")
   */
  private $products;

  public function __construct() {
    $this->products = new ArrayCollection();
  }
}
