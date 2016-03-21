<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Pergunta
 *
 * @ORM\Table(name="pergunta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_pergunta_enquete1_idx", columns={"enquete_id"})})
 * @ORM\Entity
 */
class Pergunta
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
     * @ORM\Column(name="no_pergunta", type="string", length=100, nullable=false)
     */
    private $noPergunta;

    /**
     * @var \Enquete
     *
     * @ORM\ManyToOne(targetEntity="Enquete")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="enquete_id", referencedColumnName="id")
     * })
     */
    private $enquete;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="App\EnqueteBundle\Entity\OpcaoResposta", mappedBy="pergunta")
     */
    private $opcaoResposta;

    public function __construct()
    {
        $this->opcaoResposta = new ArrayCollection();
    }

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
     * Set noPergunta
     *
     * @param string $noPergunta
     * @return Pergunta
     */
    public function setNoPergunta($noPergunta)
    {
        $this->noPergunta = $noPergunta;

        return $this;
    }

    /**
     * Get noPergunta
     *
     * @return string 
     */
    public function getNoPergunta()
    {
        return $this->noPergunta;
    }

    /**
     * Set enquete
     *
     * @param \App\EnqueteBundle\Entity\Enquete $enquete
     * @return Pergunta
     */
    public function setEnquete(\App\EnqueteBundle\Entity\Enquete $enquete = null)
    {
        $this->enquete = $enquete;

        return $this;
    }

    /**
     * Get enquete
     *
     * @return \App\EnqueteBundle\Entity\Enquete 
     */
    public function getEnquete()
    {
        return $this->enquete;
    }

    /**
     * @return ArrayCollection
     */
    public function getOpcaoResposta()
    {
        return $this->opcaoResposta;
    }

    /**
     * @param ArrayCollection $opcaoResposta
     * @innerEntity \App\EnqueteBundle\Entity\OpcaoResposta
     */
    public function setOpcaoResposta(ArrayCollection $opcaoResposta)
    {
        $this->opcaoResposta = $opcaoResposta;
    }

    /**
     * Add OpcaoResposta
     *
     * @param \App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta
     * @return Pergunta
     */
    public function addOpcaoResposta(\App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta = null)
    {
        if (!$this->opcaoResposta) {
            $this->opcaoResposta = new ArrayCollection();
        }

        $this->opcaoResposta->add($opcaoResposta);

        return $this;
    }

    /**
     * Remove opcaoResposta
     *
     * @param \App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta
     * @return Pergunta
     */
    public function removeOpcaoResposta(\App\EnqueteBundle\Entity\OpcaoResposta $opcaoResposta)
    {
        if (!$this->opcaoResposta->contains($opcaoResposta)) {
            return;
        }

        $this->opcaoResposta->removeElement($opcaoResposta);

        $opcaoResposta->setIdAvaliacao(null);
    }

}
