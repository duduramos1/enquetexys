<?php
namespace App\EnqueteBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

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
}