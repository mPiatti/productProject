<?php

namespace ProductBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProductRepository extends EntityRepository
{
    public function findAllOrderedByDate()
    {
        return $this->createQueryBuilder('p')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function filterByTagsName(string $tags)
    {
        $tagNames = explode(',', $tags);

        $tagNames = array_combine(
            array_map(function($k){ return 'tag_'.$k; }, array_keys($tagNames)),
            $tagNames
        );

        $query = $this->createQueryBuilder('p')
            ->innerJoin('p.tags', 't');

        foreach ($tagNames as $key => $name) {
            $query->where("t.name LIKE :{$key}");
        }

        $query->orderBy('p.createdAt', 'DESC');

        $query->setParameters($tagNames);

        return $query->getQuery()->getResult();
    }
}
