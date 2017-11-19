<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
