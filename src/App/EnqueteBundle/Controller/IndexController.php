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
 * @Route("/")
 */
class IndexController extends Controller
{

    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("")
     * @Template
     */
    public function indexAction()
    {

    }
}