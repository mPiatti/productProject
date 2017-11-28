<?php

namespace ProductBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ProductBundle\Entity\Tag;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="ProductBundle\Repository\ProductRepository")
 * @ORM\Table(name="product")
 * @ORM\HasLifecycleCallbacks
 * @Vich\Uploadable
 */
class Product
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="product_image", fileNameProperty="image")
     *
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     *
     * @var DateTime
     */
    private $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="products")
     * @ORM\JoinTable(name="products_tags")
     * @Assert\Count(min = 1, minMessage = "You must specify at least one tag")
     *
     * @var ArrayCollection
     */
    private $tags;

    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param File $image
     */
    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;
    }

    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @param string $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param Tag $tag
     */
    public function addTag(Tag $tag)
    {
        $tag->addProduct($this);
        $this->tags[] = $tag;
    }

    /**
     * @param ArrayCollection $tags
     */
    public function setTags(ArrayCollection $tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @ORM\PrePersist
     */
    public function onPrePersist()
    {
        $this->createdAt = new \DateTime('now');
    }
}
