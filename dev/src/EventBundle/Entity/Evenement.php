<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 *
 * @ORM\Table(name="evenement")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\EvenementRepository")
 */
class Evenement
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var text
     *
     * @ORM\Column(name="type", type="text")
     */
    private $type;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateevent", type="date")
     */
    private $dateevent;

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
     * Set nom
     *
     * @param string $nom
     *
     * @return Evenement
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set type
     *
     * @param text $type
     *
     * @return Evenement
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return text
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set dateevent
     *
     * @param \DateTime $dateevent
     *
     * @return Evenement
     */
    public function setDateevent($dateevent)
    {
        $this->dateevent = $dateevent;

        return $this;
    }

    /**
     * Get dateevent
     *
     * @return \DateTime
     */
    public function getDateevent()
    {
        return $this->dateevent;
    }

    /**
     * Set nbrpart
     *
     * @param integer $nbrpart
     *
     * @return Evenement
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
}

