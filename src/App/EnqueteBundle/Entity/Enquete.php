<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Enquete
 *
 * @ORM\Table(name="enquete", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class Enquete
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
     * @ORM\Column(name="no_enquete", type="string", length=50, nullable=false)
     */
    private $noEnquete;

    /**
     * @var array
     *
     * @ORM\OneToMany(targetEntity="App\EnqueteBundle\Entity\Pergunta", mappedBy="enquete", cascade={"persist","remove"})
     */
    private $pergunta;

    public function __construct()
    {
        $this->pergunta = new ArrayCollection();
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
     * Set noEnquete
     *
     * @param string $noEnquete
     * @return Enquete
     */
    public function setNoEnquete($noEnquete)
    {
        $this->noEnquete = $noEnquete;

        return $this;
    }

    /**
     * Get noEnquete
     *
     * @return string
     */
    public function getNoEnquete()
    {
        return $this->noEnquete;
    }

    /**
     * @return ArrayCollection
     */
    public function getPergunta()
    {
        return $this->pergunta;
    }

    /**
     * @param ArrayCollection $pergunta
     * @innerEntity \App\EnqueteBundle\Entity\Pergunta
     */
    public function setPergunta(ArrayCollection $pergunta)
    {
        $this->pergunta = $pergunta;
    }

    /**
     * Add Pergunta
     *
     * @param \App\EnqueteBundle\Entity\Pergunta $pergunta
     * @return Enquete
     */
    public function addPergunta(\App\EnqueteBundle\Entity\Pergunta $pergunta = null)
    {
        if (!$this->pergunta) {
            $this->pergunta = new ArrayCollection();
        }

        $this->pergunta->add($pergunta);

        return $this;
    }

    /**
     * Remove pergunta
     *
     * @param \App\EnqueteBundle\Entity\Pergunta $pergunta
     * @return Enquete
     */
    public function removePergunta(\App\EnqueteBundle\Entity\Pergunta $pergunta)
    {
        if (!$this->pergunta->contains($pergunta)) {
            return;
        }

        $this->pergunta->removeElement($pergunta);

        $pergunta->setIdAvaliacao(null);
    }

}
