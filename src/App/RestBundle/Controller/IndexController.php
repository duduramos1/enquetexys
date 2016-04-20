<?php
namespace App\RestBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Rest index
 *
 * @Rest\Prefix("api/app/rest/index")
 * @Rest\NamePrefix("api_app_rest_index_")
 */
class IndexController extends FOSRestController
{

    /**
     * Action que deve ser mapeada para visualização de registros
     *
     */
    public function indexAction()
    {

    }
}