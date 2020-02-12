<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Participant
 *
 * @ORM\Table(name="participant")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\ParticipantRepository")
 */
class Participant
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
     * @ORM\Column(name="nbrpart", type="integer")
     */
    private $nbrpart;


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
     * Set nbrpart
     *
     * @param integer $nbrpart
     *
     * @return Participant
     */
    public function setNbrpart($nbrpart)
    {
        $this->nbrpart = $nbrpart;

        return $this;
    }

    /**
     * Get nbrpart
     *
     * @return int
     */
    public function getNbrpart()
    {
        return $this->nbrpart;
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
    /**
     * @ORM\ManyToOne(targetEntity="eleve")
     *
     * @ORM\JoinColumn(name="eleve_id",referencedColumnName="id")
     */
    private $eleve;

    /**
     * @return mixed
     */
    public function geteleve()
    {
        return $this->eleve;
    }

    /**
     * @param mixed $eleve
     */
    public function seteleve($eleve)
    {
        $this->eleve= $eleve;
    }

}

