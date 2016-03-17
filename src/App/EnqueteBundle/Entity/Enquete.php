<?php

namespace App\EnqueteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
}
