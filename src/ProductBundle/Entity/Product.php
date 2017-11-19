<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
  /**
   * @ORM\Column(type="integer", name="product_id")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  private $productId;

  /**
   * @ORM\Column(type="string")
   */
  private $name;

  /**
   * @ORM\Column(type="text")
   */
  private $description;

  /**
   * @ORM\Column(type="string", name="main_image")
   */
  private $mainImage;
}
