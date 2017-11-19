<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Product;
use ProductBundle\Form\ProductType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product/create", name="product_create")
     */
    public function createAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($product);
                $em->flush();

                return $this->redirectToRoute('product_create');
            } catch(\Doctrine\DBAL\DBALException $e) {
                return $this->redirectToRoute('product_create');
            }

        }

        return $this->render('ProductBundle:Product:create.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/product/list", name="product_list")
     */
    public function listAction()
    {
        //TODO
    }

    /**
     * @Route("/product/{product_id}/edit", name="product_edit")
     */
    public function editAction($product_id)
    {
        //TODO
    }
}
