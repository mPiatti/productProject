<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Product;
use ProductBundle\Form\Type\ProductType;
use ProductBundle\Form\Type\ProductListType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $form = $this->createForm(ProductType::class, $request);

        $form->handleRequest($request);
/*
        $validator = $this->get('validator');
        $errors = $validator->validate($product);
        if (count($errors) > 0) {
            $this->addFlash('danger', (string)$errors);
        }
*/

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $this->addFlash('success', 'Your changes were saved!');
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
            'product' => $product,
            'productForm' => $form->createView()
        ));
    }

    /**
     * @Route("/list", name="product_list")
     */
    public function listAction(Request $request)
    {
        $form = $this->createForm(ProductListType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $products = $this->getDoctrine()
                ->getRepository(Product::class)
                ->filterByTagsName($form->getData()['tags']);
        } else {
            $products = $this->getDoctrine()
                ->getRepository(Product::class)
                ->findAllOrderedByDate();
        }

        return $this->render('@Product/Product/list.html.twig', array(
            'listForm' => $form->createView(),
            'products' => $products
        ));
    }
}
