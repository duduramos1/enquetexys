<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="resposta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_resposta_opcao_resposta1_idx", columns={"opcao_resposta_id"})})
 * @ORM\Entity
 */
class Resposta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \OpcaoResposta
     *
     * @ORM\ManyToOne(targetEntity="OpcaoResposta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="opcao_resposta_id", referencedColumnName="id")
     * })
     */
    private $opcaoResposta;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set opcaoResposta
     *
     * @param \App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta
     * @return Resposta
     */
    public function setOpcaoResposta(\App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta = null)
    {
        $this->opcaoResposta = $opcaoResposta;

        return $this;
    }

    /**
     * Get opcaoResposta
     *
     * @return \App\EnqueteBundle\Entity\OpcaoResposta 
     */
    public function getOpcaoResposta()
    {
        return $this->opcaoResposta;
    }
}
