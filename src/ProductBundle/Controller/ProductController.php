<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Product;
use ProductBundle\Form\Type\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/product")
 */
class ProductController extends Controller
{
    /**
     * @Route("/create", name="product_create")
     */
    public function createAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_create');
        }

        return $this->render('@Product/Product/create.html.twig', array(
            'productForm' => $form->createView()
        ));
    }

    /**
     * @Route("/{id}/edit", name="product_edit")
     */
    public function editAction(Request $request, Product $product)
    {
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_list');
        }

        return $this->render('@Product/Product/edit.html.twig', array(
            'productForm' => $form->createView()
        ));
    }

    /**
     * @Route("/list", name="product_list")
     */
    public function listAction()
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAllOrderedByDate();

        return $this->render('@Product/Product/list.html.twig', array(
            'products' => $products
        ));
    }
}
