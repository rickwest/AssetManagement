<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Threat
 *
 * @ORM\Table(name="threat")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThreatRepository")
 */
class Threat
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
     * @ORM\Column(name="threat", type="text")
     */
    private $threat;

    /**
     * @var string
     *
     * @ORM\Column(name="vulnerability", type="text")
     */
    private $vulnerability;

    /**
     * @var float
     *
     *
     *
     * @ORM\Column(name="likelihood", type="float")
     */
    private $likelihood;

    /**
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @var float
     *
     * @ORM\Column(name="mitigation", type="float")
     */
    private $mitigation;

    /**
     * @var float
     *
     * @ORM\Column(name="uncertainty", type="float")
     */
    private $uncertainty;


    /**
     * @var float
     *
     * @ORM\Column(name="risk", type="float")
     */
    private $risk;


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
     * Set threat
     *
     * @param string $threat
     *
     * @return Threat
     */
    public function setThreat($threat)
    {
        $this->threat = $threat;

        return $this;
    }

    /**
     * Get threat
     *
     * @return string
     */
    public function getThreat()
    {
        return $this->threat;
    }

    /**
     * Set vilnerability
     *
     * @param string $vulnerability
     *
     * @return Threat
     */
    public function setVulnerability($vulnerability)
    {
        $this->vulnerability = $vulnerability;

        return $this;
    }

    /**
     * Get vilnerability
     *
     * @return string
     */
    public function getVulnerability()
    {
        return $this->vulnerability;
    }

    /**
     * Set likelihood
     *
     * @param float $likelihood
     *
     * @return Threat
     */
    public function setLikelihood($likelihood)
    {
        $this->likelihood = $likelihood;

        return $this;
    }

    /**
     * Get likelihood
     *
     * @return float
     */
    public function getLikelihood()
    {
        return $this->likelihood;
    }

    /**
     * Set value
     *
     * @param float $value
     *
     * @return Threat
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set mitigation
     *
     * @param string $mitigation
     *
     * @return Threat
     */
    public function setMitigation($mitigation)
    {
        $this->mitigation = $mitigation;

        return $this;
    }

    /**
     * Get mitigation
     *
     * @return string
     */
    public function getMitigation()
    {
        return $this->mitigation;
    }

    /**
     * Set uncertaininty
     *
     * @param string $uncertainty
     *
     * @return Threat
     */
    public function setUncertainty($uncertainty)
    {
        $this->uncertainty = $uncertainty;

        return $this;
    }

    /**
     * Get uncertaininty
     *
     * @return string
     */
    public function getUncertainty()
    {
        return $this->uncertainty;
    }
}

