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
     * @ORM\Column(name="no_titulo", type="string", length=45, nullable=false)
     */
    private $noTitulo;



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
     * Set noTitulo
     *
     * @param string $noTitulo
     * @return Enquete
     */
    public function setNoTitulo($noTitulo)
    {
        $this->noTitulo = $noTitulo;

        return $this;
    }

    /**
     * Get noTitulo
     *
     * @return string 
     */
    public function getNoTitulo()
    {
        return $this->noTitulo;
    }
}
