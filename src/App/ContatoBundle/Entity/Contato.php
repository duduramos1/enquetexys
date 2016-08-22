<?php

namespace App\ContatoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contato
 *
 * @ORM\Table(name="tb_contato")
 * @ORM\Entity(repositoryClass="App\ContatoBundle\Repository\ContatoRepository")
 */
class Contato
{
    /**
     * @var integer
     *
     * @ORM\Column(name="co_contato", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coContato;

    /**
     * @var integer
     *
     * @ORM\Column(name="nu_contato", type="integer")
     */
    private $nuContato;

    /**
     * @return int
     */
    public function getCoContato()
    {
        return $this->coContato;
    }

    /**
     * Set nuContato
     *
     * @param string $nuContato
     * @return Contato
     */
    public function setNuContato($nuContato)
    {
        $this->nuContato = $nuContato;

        return $this;
    }

    /**
     * Get nuContato
     *
     * @return int
     */
    public function getNuContato()
    {
        return $this->nuContato;
    }
}