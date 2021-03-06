<?php

namespace TS\CYABundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use TS\CYABundle\Doctrine\Behaviors\Loggable\Loggable as MoocAdminBundleLoggableTrait;

/**
 * TS\CYABundle\Entity\Service
 *
 * @ORM\Entity(repositoryClass="TS\CYABundle\Repository\ServiceRepository")
 * @ORM\Table(name="Service", indexes={@ORM\Index(name="fk_Servicios_Sede1_idx", columns={"headquarters_id"})})
 */
class Service
{
    use ORMBehaviors\Timestampable\Timestampable,
        ORMBehaviors\Blameable\Blameable;

    const OPTIONAL = 'OPTIONAL';
    const REQUIRED = 'REQUIRED';

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @ORM\Column(name="`name`", type="string", length=250)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $description;

    /**
     * @ORM\Column(name="`type`", type="string", length=10)
     */
    protected $type = self::OPTIONAL;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $charge_per_week;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $uses_limit_weeks;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $summer_supplement;

    /**
     * @ORM\Column(type="integer")
     */
    protected $limit_week;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $is_health_coverage;

    /**
     * @ORM\Column(type="float")
     */
    protected $price;

    /**
     * @ORM\Column(type="string")
     */
    protected $headquarters_id;

    /**
     * @ORM\ManyToMany(targetEntity="Quotation", mappedBy="service")
     */
    protected $quotations;

    /**
     * @ORM\ManyToOne(targetEntity="Headquarter", inversedBy="services")
     * @ORM\JoinColumn(name="headquarters_id", referencedColumnName="id", nullable=false)
     */
    protected $headquarter;

    public function __construct()
    {
        $this->quotations = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \TS\CYABundle\Entity\Service
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getSummerSupplement()
    {
        return $this->summer_supplement;
    }

    /**
     * @param mixed $summer_supplement
     */
    public function setSummerSupplement($summer_supplement)
    {
        $this->summer_supplement = $summer_supplement;
    }

    /**
     * @return mixed
     */
    public function getChargePerWeek()
    {
        return $this->charge_per_week;
    }

    /**
     * @param mixed $charge_per_week
     */
    public function setChargePerWeek($charge_per_week)
    {
        $this->charge_per_week = $charge_per_week;
    }

    /**
     * @return mixed
     */
    public function getUsesLimitWeeks()
    {
        return $this->uses_limit_weeks;
    }

    /**
     * @param mixed $uses_limit_weeks
     */
    public function setUsesLimitWeeks($uses_limit_weeks)
    {
        $this->uses_limit_weeks = $uses_limit_weeks;
    }

    /**
     * @return mixed
     */
    public function getLimitWeek()
    {
        return $this->limit_week;
    }

    /**
     * @param mixed $limit_week
     */
    public function setLimitWeek($limit_week)
    {
        $this->limit_week = $limit_week;
    }

    /**
     * @return mixed
     */
    public function getIsHealthCoverage()
    {
        return $this->is_health_coverage;
    }

    /**
     * @param mixed $is_health_coverage
     */
    public function setIsHealthCoverage($is_health_coverage)
    {
        $this->is_health_coverage = $is_health_coverage;
    }

    /**
     * Set the value of name.
     *
     * @param string $name
     * @return \TS\CYABundle\Entity\Service
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \TS\CYABundle\Entity\Service
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of price.
     *
     * @param float $price
     * @return \TS\CYABundle\Entity\Service
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of headquarters_id.
     *
     * @param integer $headquarters_id
     * @return \TS\CYABundle\Entity\Service
     */
    public function setHeadquartersId($headquarters_id)
    {
        $this->headquarters_id = $headquarters_id;

        return $this;
    }

    /**
     * Get the value of headquarters_id.
     *
     * @return integer
     */
    public function getHeadquartersId()
    {
        return $this->headquarters_id;
    }

    /**
     * Add Quotation entity to collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Service
     */
    public function addQuotation(Quotation $quotation)
    {
        $this->quotations->add($quotation);

        return $this;
    }

    /**
     * Remove Quotation entity from collection (one to many).
     *
     * @param \TS\CYABundle\Entity\Quotation $quotation
     * @return \TS\CYABundle\Entity\Service
     */
    public function removeQuotation(Quotation $quotation)
    {
        $this->quotations->removeElement($quotation);

        return $this;
    }

    /**
     * Get Quotation entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuotations()
    {
        return $this->quotations;
    }

    /**
     * Set Headquarter entity (many to one).
     *
     * @param \TS\CYABundle\Entity\Headquarter $headquarter
     * @return \TS\CYABundle\Entity\Service
     */
    public function setHeadquarter(Headquarter $headquarter = null)
    {
        $this->headquarter = $headquarter;

        return $this;
    }

    /**
     * Get Headquarter entity (many to one).
     *
     * @return \TS\CYABundle\Entity\Headquarter
     */
    public function getHeadquarter()
    {
        return $this->headquarter;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getName() . $this->getId();
    }

    public function __sleep()
    {
        return array('id', 'name', 'description', 'price', 'headquarters_id');
    }
}