<?php

namespace EventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sponsor
 *
 * @ORM\Table(name="sponsor")
 * @ORM\Entity(repositoryClass="EventBundle\Repository\SponsorRepository")
 */
class Sponsor
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
     * @ORM\Column(name="nomsponsor", type="string", length=255)
     */
    private $nomsponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="typeprod", type="string", length=255)
     */
    private $typeprod;


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
     * Set nomsponsor
     *
     * @param string $nomsponsor
     *
     * @return Sponsor
     */
    public function setNomsponsor($nomsponsor)
    {
        $this->nomsponsor = $nomsponsor;

        return $this;
    }

    /**
     * Get nomsponsor
     *
     * @return string
     */
    public function getNomsponsor()
    {
        return $this->nomsponsor;
    }

    /**
     * Set typeprod
     *
     * @param string $typeprod
     *
     * @return Sponsor
     */
    public function setTypeprod($typeprod)
    {
        $this->typeprod = $typeprod;

        return $this;
    }

    /**
     * Get typeprod
     *
     * @return string
     */
    public function getTypeprod()
    {
        return $this->typeprod;
    }
}

