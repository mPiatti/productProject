<?php

namespace ProductBundle\Form\DataTransformer;

use ProductBundle\Entity\Tag;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Form\DataTransformerInterface;

class TagsToStringTransformer implements DataTransformerInterface
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @param  ArrayCollection|null $tags
     * @return string
     */
    public function transform($tags)
    {
        if (null === $tags) {
            return '';
        }

        $tagNames = array();

        foreach ($tags as $tag) {
            $tagNames[] = $tag->getName();
        }

        return implode(',', $tagNames);
    }

    /**
     * @param  string $tagString
     * @return ArrayCollection|null
     */
    public function reverseTransform($tagString)
    {
        if ($tagString === null) {
            return new ArrayCollection();
        }

        $tagNames = explode(',', $tagString);

        $tags = new ArrayCollection();

        foreach ($tagNames as $tagName) {
            $tag = $this->em
                ->getRepository(Tag::class)
                ->findOneBy(array('name' => $tagName))
            ;

            if (is_null($tag)) {
                $tag = new Tag();
                $tag->setName($tagName);
                $this->em->persist($tag);
                $this->em->flush();
            }

            $tags[] = $tag;
        }

        return $tags;
    }
}
