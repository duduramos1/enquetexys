<?php
namespace App\EnqueteBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/edit")
     * @Template
     */
    public function editAction()
    {

    }

    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("/save")
     * @Method({"POST"})
     */
    public function saveAction(Request $request)
    {
        $enquete = json_decode($request->getContent(), true);

        if(!empty($enquete)){

            $result = $this->get('admin.service')->save($enquete);

        }
    }
}