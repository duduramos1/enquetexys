<?php
namespace App\InitBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Download de Arquivos do servidor
 */
class InitController extends Controller
{
    /**
     * Action que deve ser mapeada para visualização de registros
     *
     * @Route("/init/")
     * @Template
     */
    public function initAction()
    {
    }
}