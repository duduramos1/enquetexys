<?php

namespace App\RestBundle\Service;

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

                $opcaoResposta->setNoOpcaoResposta($list['nome']);
                $opcaoResposta->setPergunta($pergunta);

                $pergunta->addOpcaoResposta($opcaoResposta);
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
     * função para alterar enquete
     *
     * @param $data
     * @return bool
     */
    public function update($data)
    {
        $em = $this->getEntityManager();

        try {

            $enquete = $em->getRepository('EnqueteBundle:Enquete')->find($data['id']);
            $pergunta = $em->getRepository('EnqueteBundle:Pergunta')->find($data['idPergunta']);

            $enquete->setNoEnquete($data['titulo']);
            $pergunta->setNoPergunta($data['pergunta']);

            foreach ($data['opcaoResposta'] as $list) {

                if ($list['id']) {
                    $opcaoResposta = $em->getRepository('EnqueteBundle:OpcaoResposta')->find($list['id']);
                } else {
                    $opcaoResposta = new OpcaoResposta();

                    $opcaoResposta->setPergunta($pergunta);
                }

                $opcaoResposta->setNoOpcaoResposta($list['nome']);

                $pergunta->addOpcaoResposta($opcaoResposta);
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
     * função para deletar enquete
     *
     * @param $data
     * @return bool
     */
    public function deletar($enqueteId)
    {
        $em = $this->getEntityManager();

        try {

            $enquete = $em->getRepository('EnqueteBundle:Enquete')->find($enqueteId);

            $em->remove($enquete);
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

        try {

        $enquete = $em->getRepository('EnqueteBundle:Enquete')->find($id);

        $arr = [
            'id' => $enquete->getId(),
            'titulo' => $enquete->getNoEnquete(),
            'pergunta' => $enquete->getPergunta()->last()->getNoPergunta(),
            'idPergunta' => $enquete->getPergunta()->last()->getId()
        ];

        $res = [];
        foreach ($enquete->getPergunta()->last()->getOpcaoResposta() as $key => $list) {
            $arr['opcaoResposta'][$key]['nome'] = $list->getNoOpcaoResposta();
            $arr['opcaoResposta'][$key]['id'] = $list->getId();

            $resposta = $em->getRepository("EnqueteBundle:Resposta")->findBy([
                'opcaoResposta' => $list->getId()
            ]);

            $res[$list->getNoOpcaoResposta()] = $resposta;

        }

        $arr['porcentagem'] = $this->calcularPorcentagem($res);


            return $arr;
        } catch (\Exception $e) {
            return false;
        }

    }

    /**
     * logica para calcular a porcentagem das respostas
     *
     * @param $res
     * @return array
     */
    public function calcularPorcentagem($res)
    {
        $calc = [];
        if (!empty($res)) {

            $count = 0;
            $e = [];
            foreach ($res as $keyResp => $resp) {
                if (!empty($resp)) {
                    $count = $count + count($resp);
                    $e[$keyResp] = count($resp);
                }
            }
            if (!empty($e)) {
                foreach ($e as $keyItem => $item) {
                    $calc[$keyItem] = ($item * 100) / $count;
                }
            }
        }

        return $calc;
    }
}
