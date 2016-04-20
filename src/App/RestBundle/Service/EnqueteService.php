<?php

namespace App\RestBundle\Service;

use App\EnqueteBundle\Entity\Resposta;
use \JMS\DiExtraBundle\Annotation as DI;
use \App\EnqueteBundle\Service\ApoioService\AbstractService as AbstractService;
use App\EnqueteBundle\Entity\Enquete;

/**
 * @DI\Service("enquete.service")
 ******************************************************/
class EnqueteService extends AbstractService
{

    /**
     * função para resgatar todas as enquetes
     *
     * @return \App\EnqueteBundle\Entity\Enquete[]|bool
     */
    public function getEnquete()
    {
        $em = $this->getEntityManager();

        try {

            $enquete = $em->getRepository('EnqueteBundle:Enquete')->findAll();

            return $enquete;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * função para resgatar todas as enquetes
     *
     * @return bool
     */
    public function saveResposta($arrResposta)
    {
        $em = $this->getEntityManager();

        try {

        foreach ($arrResposta as $opResposta) {

            $opcaoResposta = $em->getRepository("EnqueteBundle:OpcaoResposta")->find($opResposta['opResposta']);
            $resposta = new Resposta();

            $resposta->setOpcaoResposta($opcaoResposta);

            $em->persist($resposta);
        }

        $em->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

}
