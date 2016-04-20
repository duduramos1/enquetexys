<?php
namespace App\RestBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

/**
 * Download de Arquivos do servidor
 * @Route("/enquete")
 */
class EnqueteController extends Controller
{
    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {

    }

    /**
     * Função que retorna todos os dados de enquete
     *
     * @Route("/getenquete")
     * @Method({"GET"})
     * @return JsonResponse
     */
    public function getEnqueteAction()
    {
        $encoder = new JsonEncoder();
        $normalizer = new ObjectNormalizer();

        $normalizer->setCircularReferenceHandler(function ($object) {
            return $object;
        });

        $serializer = new Serializer(array($normalizer), array($encoder));

        $result = $this->get('enquete.service')->getEnquete();

        $enquete = $serializer->serialize($result, 'json');

        return new JsonResponse($enquete);
    }

    /**
     * função responsável por salvar as respostas
     *
     * @Route("/saveresposta")
     * @Method({"POST"})
     * @return JsonResponse
     */
    public function saveRespostaAction(Request $request)
    {
        $resposta = json_decode($request->getContent(), true);
        $result = false;

        if ($resposta) {
            $result = $this->get('enquete.service')->saveResposta($resposta);
        }
        return new JsonResponse($result);
    }

}