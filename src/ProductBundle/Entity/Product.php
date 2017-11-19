<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks
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
   * @ORM\Column(type="text", nullable=true)
   */
  private $description;

  /**
   * @ORM\Column(type="string", name="main_image", nullable=true)
   */
  private $mainImage;

  /**
   * @ORM\Column(type="datetime", name="created_at")
   */
  private $createdAt;

  /**
   * Many Products have many tags
   * @ORM\ManyToMany(targetEntity="Tag", inversedBy="products")
   * @ORM\JoinTable(name="products_tags",
   *      joinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="product_id")},
   *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="tag_id")}
   *      )
   */
  private $tags;

  public function __construct() {
    $this->tags = new ArrayCollection();
  }
}
