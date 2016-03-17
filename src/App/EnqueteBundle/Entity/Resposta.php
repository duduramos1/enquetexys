<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Resposta
 *
 * @ORM\Table(name="resposta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_resposta_pergunta1_idx", columns={"pergunta"})})
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
     * @var string
     *
     * @ORM\Column(name="no_resposta", type="string", length=100, nullable=false)
     */
    private $noResposta;

    /**
     * @var \Pergunta
     *
     * @ORM\ManyToOne(targetEntity="Pergunta")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pergunta", referencedColumnName="id")
     * })
     */
    private $pergunta;



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
     * Set noResposta
     *
     * @param string $noResposta
     * @return Resposta
     */
    public function setNoResposta($noResposta)
    {
        $this->noResposta = $noResposta;

        return $this;
    }

    /**
     * Get noResposta
     *
     * @return string 
     */
    public function getNoResposta()
    {
        return $this->noResposta;
    }

    /**
     * Set pergunta
     *
     * @param \App\EnqueteBundle\Entity\Pergunta $pergunta
     * @return Resposta
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
}
