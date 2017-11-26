<?php

namespace ProductBundle\Form\Type;

use ProductBundle\Entity\Product;
use ProductBundle\Form\DataTransformer\TagsToStringTransformer;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, ['required' => false, 'label' => 'Product Name'])
            ->add('description', TextareaType::class, ['label' => 'Product Description', 'required' => false])
            ->add('tags', TextType::class, ['required' => false, 'label' => 'Tags'])
        ;

        $builder->get('tags')
            ->addModelTransformer(new TagsToStringTransformer($this->em));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Product::class,
        ));
    }
}
