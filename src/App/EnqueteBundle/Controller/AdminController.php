<?php
namespace App\EnqueteBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Download de Arquivos do servidor
 * @Route("/admin")
 */
class AdminController extends Controller
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
     * Action que busca todas as enquetes
     *
     * @Route("/getenquete")
     * @Method({"GET"})
     */
    public function getEnqueteAction()
    {
        $result = $this->get('admin.service')->getEnquete();

        if ($result) {
            return new JsonResponse($result);
        }

        return new Response('false');
    }

    /**
     * Action que busca todas as enquetes
     *
     * @Route("/getenqueteid")
     * @Method({"POST"})
     */
    public function getEnqueteIdAction(Request $request)
    {
        $id = json_decode($request->getContent(), true);

        $result = $this->get('admin.service')->getEnqueteId($id);

        if ($result) {
            return new JsonResponse($result);
        }

        return new Response('false');
    }

    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("/create")
     * @Template
     */
    public function createAction()
    {

    }

    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("/edit/")
     * @Template
     */
    public function editAction()
    {

    }

    /**
     * Action para cadastrar enquete
     *
     * @Route("/save")
     * @Method({"POST","PUT"})
     */
    public function saveAction(Request $request)
    {
        $enquete = json_decode($request->getContent(), true);

        if (!empty($enquete)) {
            if (!empty($enquete['id'])) {
                $result = $this->get('admin.service')->update($enquete);
            } else {
                $result = $this->get('admin.service')->save($enquete);
            }

            if ($result) {
                return new Response('true');
            }
        }
        return new Response('false');
    }
}