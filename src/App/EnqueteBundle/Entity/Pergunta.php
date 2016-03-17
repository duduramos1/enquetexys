<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pergunta
 *
 * @ORM\Table(name="pergunta", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_pergunta_enquete_idx", columns={"enquete"})})
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
     *   @ORM\JoinColumn(name="enquete", referencedColumnName="id")
     * })
     */
    private $enquete;



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
}
