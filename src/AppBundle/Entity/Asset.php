<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asset
 *
 * @ORM\Table(name="asset")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssetRepository")
 */
class Asset
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
     * @ORM\Column(name="short_code", type="string", length=10, nullable=true, unique=true)
     */
    private $shortCode;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="make", type="string", length=255, nullable=true)
     */
    private $make;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=255, nullable=true)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="serial", type="string", length=255, nullable=true)
     */
    private $serial;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255, nullable=true)
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="classification", type="string", length=255)
     */
    private $classification;

    /**
     * @var string
     *
     * @ORM\Column(name="specification", type="string", length=255, nullable=true)
     */
    private $specification;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="string", length=255, nullable=true)
     */
    private $notes;

    /**
     * @var float
     *
     * @ORM\Column(name="impact_revenue", type="float")
     */
    private $impactRevenue;

    /**
     * @var float
     *
     * @ORM\Column(name="impact_profitability", type="float")
     */
    private $impactProfitability;

    /**
     * @var float
     *
     * @ORM\Column(name="impact_image", type="float")
     */
    private $impactImage;

    /**
     * @var float
     *
     * @ORM\Column(name="weighted_score", type="float")
     */
    private $weightedScore;

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
     * Set shortCode
     *
     * @param string $shortCode
     *
     * @return Asset
     */
    public function setShortCode($shortCode)
    {
        $this->shortCode = $shortCode;

        return $this;
    }

    /**
     * Get shortCode
     *
     * @return string
     */
    public function getShortCode()
    {
        return $this->shortCode;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Asset
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set make
     *
     * @param string $make
     *
     * @return Asset
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return Asset
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set serial
     *
     * @param string $serial
     *
     * @return Asset
     */
    public function setSerial($serial)
    {
        $this->serial = $serial;

        return $this;
    }

    /**
     * Get serial
     *
     * @return string
     */
    public function getSerial()
    {
        return $this->serial;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return Asset
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Asset
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set specification
     *
     * @param string $specification
     *
     * @return Asset
     */
    public function setSpecification($specification)
    {
        $this->specification = $specification;

        return $this;
    }

    /**
     * Get specification
     *
     * @return string
     */
    public function getSpecification()
    {
        return $this->specification;
    }

    /**
     * Set notes
     *
     * @param string $notes
     *
     * @return Asset
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @return float
     */
    public function getImpactRevenue() {
        return $this->impactRevenue;
    }

    /**
     * @param float $impactRevenue
     * @return Asset
     */
    public function setImpactRevenue($impactRevenue) {
        $this->impactRevenue = $impactRevenue;
        return $this;
    }

    /**
     * @return float
     */
    public function getImpactProfitability() {
        return $this->impactProfitability;
    }

    /**
     * @param float $impactProfitability
     * @return Asset
     */
    public function setImpactProfitability($impactProfitability){
        $this->impactProfitability = $impactProfitability;
        return $this;
    }

    /**
     * @return float
     */
    public function getImpactImage() {
        return $this->impactImage;
    }

    /**
     * @param float $impactImage
     * @return Asset
     */
    public function setImpactImage($impactImage) {
        $this->impactImage = $impactImage;
        return $this;
    }

    /**
     * @return float
     */
    public function getWeightedScore() {
        return $this->weightedScore;
    }

    /**
     * @param float $weightedScore
     * @return Asset
     */
    public function setWeightedScore($weightedScore) {
        $this->weightedScore = $weightedScore;
        return $this;
    }

    /**
     * @return string
     */
    public function getClassification() {
        return $this->classification;
    }

    /**
     * @param string $classification
     * @return Asset
     */
    public function setClassification($classification) {
        $this->classification = $classification;
        return $this;
    }
}

