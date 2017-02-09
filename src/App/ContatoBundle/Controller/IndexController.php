<?php
namespace App\ContatoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Rest index
 *
 * @Rest\Prefix("api/app/contato/index")
 * @Rest\NamePrefix("api_app_contato_index_")
 */
class IndexController extends FOSRestController
{
}