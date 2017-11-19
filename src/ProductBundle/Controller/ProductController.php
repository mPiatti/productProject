<?php

namespace ProductBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProductController extends Controller
{
    /**
     * @Route("/product/create", name="product_create")
     */
    public function createAction()
    {
        //TODO
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
