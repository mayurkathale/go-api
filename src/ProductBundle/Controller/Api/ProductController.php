<?php


namespace ProductBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * @return JsonResponse
     * @Route("/api/product/list",name="product_list")
     * @Method({"GET"})
     */
    public function getProductList()
    {
        $list = $this->getDoctrine()->getRepository('ProductBundle:Product')->findAll();
        $data = $this->get('jms_serializer')->serialize($list, 'json');
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> json_decode($data)
        );
        return new JsonResponse($response);
    }

    /**
     * @return JsonResponse
     * @Route("/api/product/{id}",name="get_product")
     * @Method({"GET"})
     */
    public function getProductById(Request $request, $id)
    {
        $list = $this->getDoctrine()->getRepository('ProductBundle:Product')->find($id);
        $data = $this->get('jms_serializer')->serialize($list, 'json');
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> json_decode($data)
        );
        return new JsonResponse($response);
    }
}
