<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contrat
 *
 * @ORM\Table(name="contrat")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\ContratRepository")
 */
class Contrat
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="numcontrat", type="integer")
     */
    private $numcontrat;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set numcontrat
     *
     * @param integer $numcontrat
     *
     * @return Contrat
     */
    public function setNumcontrat($numcontrat)
    {
        $this->numcontrat = $numcontrat;

        return $this;
    }

    /**
     * Get numcontrat
     *
     * @return int
     */
    public function getNumcontrat()
    {
        return $this->numcontrat;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Sponsor")
     *
     * @ORM\JoinColumn(name="sponsor_id",referencedColumnName="id")
     */
    private $sponsor;

    /**
     * @return mixed
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * @param mixed $sponsor
     */
    public function setSponsor($sponsor)
    {
        $this->sponsor= $sponsor;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Evenement")
     *
     * @ORM\JoinColumn(name="evenement_id",referencedColumnName="id")
     */
    private $evenement;

    /**
     * @return mixed
     */
    public function getEvenement()
    {
        return $this->evenement;
    }

    /**
     * @param mixed $evenement
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;
    }
}

