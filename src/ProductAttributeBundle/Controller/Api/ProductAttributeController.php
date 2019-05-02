<?php
namespace ProductAttributeBundle\Controller\Api;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use ProductAttributeBundle\Helper\ProductAttributeHelper;

class ProductAttributeController extends Controller
{
    /**
     * @var ProductAttributeHelper
     */
    protected $helper;

    public function getHelper()
    {
        if (!$this->helper) {
            $this->helper = new ProductAttributeHelper();
        }
        return $this->helper;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Route("/api/papertype/list",name="paper_type_list")
     * @Method({"GET"})
     */
    public function getPaperType(Request $request)
    {
        $list = $this->getDoctrine()->getRepository('ProductAttributeBundle:PaperType')->findAll();
        $data = $this->get('jms_serializer')->serialize($list, 'json');
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> json_decode($data)
            );
        return new JsonResponse($response);
    }

    /**
     * @Route("/api/paperformat/list",name="paper_format_list")
     * @Method({"GET"})
     */
    public function getPaperFormat()
    {
        $list = $this->getDoctrine()->getRepository('ProductAttributeBundle:PaperFormat')->findAll();
        $data = $this->get('jms_serializer')->serialize($list, 'json');
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> json_decode($data)
        );
        return new JsonResponse($response);
    }

    /**
     * @param Request $request
     * @param integer $id
     * @return JsonResponse
     * @Route("/api/product/price/{id}",name="product__price")
     * @Method({"GET"})
     */
    public function getProductPriceList(Request $request, $id)
    {
        $list = $this
            ->getDoctrine()
            ->getRepository('ProductAttributeBundle:ProductPrice')
            ->findBy(array('productId' => $id), array('price' => 'ASC'));
        $data = $this->getHelper()->prepareDatePrice($list);
        $response = array('code' => 0,
            'message' => "success",
            'error'=> null,
            'result'=> $data
        );
        return new JsonResponse($response);
    }
}
