<?php

namespace RaulConti\ClashOfClansBundle\Entity;

/**
 * Class League
 * @package RaulConti\ClashOfClansBundle\Entity
 */
class League
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
    protected $iconUrls;


    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getIconUrls()
    {
        return $this->iconUrls;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setIconUrls($iconUrls)
    {
        $this->iconUrls = $iconUrls;
    }

}
