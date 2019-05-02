<?php


namespace OrderBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CartController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/cart/update")
     * @Method({"GET"})
     */
    public function getCartItems(Request $request)
    {
        $data = $this->getDoctrine()->getRepository('OrderBundle:Cart')->findAll();
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> array()
        );
        return new JsonResponse($data);
    }
}
