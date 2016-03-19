<?php

namespace App\EnqueteBundle\Service;

use App\EnqueteBundle\Entity\Enquete;
use App\EnqueteBundle\Entity\Pergunta;
use \JMS\DiExtraBundle\Annotation as DI;
use \App\EnqueteBundle\Service\ApoioService\AbstractService as AbstractService;

/**
 * @DI\Service("admin.service")
 ******************************************************/
class AdminService extends AbstractService
{
    public function save($data)
    {

        $em = $this->getEntityManager();

        try {

            $enquete = new Enquete();
            $pergunta = new Pergunta();

            $enquete->setNoEnquete($data['titulo']);

            $em->persist($enquete);
            $em->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }
}
