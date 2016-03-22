<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpcaoResposta
 *
 * @ORM\Table(name="opcao_resposta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_opcao_resposta_pergunta1_idx", columns={"pergunta_id"})})
 * @ORM\Entity
 */
class OpcaoResposta
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
     * @var string
     *
     * @ORM\Column(name="no_opcao_resposta", type="string", length=45, nullable=false)
     */
    private $noOpcaoResposta;

    /**
     * @var \Pergunta
     *
     * @ORM\ManyToOne(targetEntity="Pergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pergunta_id", referencedColumnName="id")
     * })
     */
    private $pergunta;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="App\EnqueteBundle\Entity\Resposta", mappedBy="opcaoResposta")
     */
    private $resposta;


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
     * Set noOpcaoResposta
     *
     * @param string $noOpcaoResposta
     * @return OpcaoResposta
     */
    public function setNoOpcaoResposta($noOpcaoResposta)
    {
        $this->noOpcaoResposta = $noOpcaoResposta;

        return $this;
    }

    /**
     * Get noOpcaoResposta
     *
     * @return string 
     */
    public function getNoOpcaoResposta()
    {
        return $this->noOpcaoResposta;
    }

    /**
     * Set pergunta
     *
     * @param \App\EnqueteBundle\Entity\Pergunta $pergunta
     * @return OpcaoResposta
     */
    public function setPergunta(\App\EnqueteBundle\Entity\Pergunta $pergunta = null)
    {
        $this->pergunta = $pergunta;

        return $this;
    }

    /**
     * Get pergunta
     *
     * @return \App\EnqueteBundle\Entity\Pergunta 
     */
    public function getPergunta()
    {
        return $this->pergunta;
    }

    /**
     * Set resposta
     *
     * @param \App\EnqueteBundle\Entity\Resposta $resposta
     * @return OpcaoResposta
     */
    public function setResposta(\App\EnqueteBundle\Entity\Resposta $resposta = null)
    {
        $this->resposta = $resposta;

        return $this;
    }

    /**
     * Get resposta
     *
     * @return \App\EnqueteBundle\Entity\Resposta
     */
    public function getResposta()
    {
        return $this->resposta;
    }
}
