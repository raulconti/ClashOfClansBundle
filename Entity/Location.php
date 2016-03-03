<?php

namespace RaulConti\ClashOfClansBundle\Entity;

/**
 * Class Location
 * @package RaulConti\ClashOfClansBundle\Entity
 */
class Location
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $isCountry;

    /**
     * @var
     */
    protected $countryCode;


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function isCountry()
    {
        return $this->isCountry;
    }

    public function getCountryCode()
    {
        return $this->countryCode;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCountry($isCountry)
    {
        $this->isCountry = $isCountry;
    }

    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }
}
