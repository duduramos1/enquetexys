<?php

namespace App\EnqueteBundle\Service;

use App\EnqueteBundle\Entity\Enquete;
use App\EnqueteBundle\Entity\OpcaoResposta;
use App\EnqueteBundle\Entity\Pergunta;
use \JMS\DiExtraBundle\Annotation as DI;
use \App\EnqueteBundle\Service\ApoioService\AbstractService as AbstractService;

/**
 * @DI\Service("admin.service")
 ******************************************************/
class AdminService extends AbstractService
{
    /**
     * função para cadastrar enquete
     *
     * @param $data
     * @return bool
     */
    public function save($data)
    {

        $em = $this->getEntityManager();

        try {

            $enquete = new Enquete();
            $pergunta = new Pergunta();

            $enquete->setNoEnquete($data['titulo']);

            $pergunta->setEnquete($enquete);
            $pergunta->setNoPergunta($data['pergunta']);

            foreach ($data['opcaoResposta'] as $list) {

                $opcaoResposta = new OpcaoResposta();

                $opcaoResposta->setNoOpcaoResposta($list);
                $opcaoResposta->setPergunta($pergunta);

                $em->persist($opcaoResposta);
            }

            $em->persist($enquete);
            $em->persist($pergunta);
            $em->flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * função para resgatar todas as enquetes
     *
     * @return \App\EnqueteBundle\Entity\Enquete[]|array|bool
     */
    public function getEnquete()
    {

        $em = $this->getEntityManager();

        try {

            $enquete = $em->getRepository('EnqueteBundle:Enquete')->findAll();

            $arr = [];

            foreach ($enquete as $item) {
                $arr[] = [
                    'id' => $item->getId(),
                    'nomeEnquete' => $item->getNoEnquete()
                ];
            }

            return $arr;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * função para resgatar enquete por id
     *
     * @param $id
     * @return array|string
     */
    public function getEnqueteId($id)
    {
        $em = $this->getEntityManager();
//salvar alteracao
        try {

            $enquete = $em->getRepository('EnqueteBundle:Enquete')->find($id);

            $arr = [
                'id' => $enquete->getId(),
                'titulo' => $enquete->getNoEnquete(),
                'pergunta' => $enquete->getPergunta()->last()->getNoPergunta()
            ];

            foreach ($enquete->getPergunta()->last()->getOpcaoResposta() as $list) {
                $arr['opcaoResposta'][] = $list->getNoOpcaoResposta();
            }

            return $arr;
        } catch (\Exception $e) {
            return false;
        }

    }
}
