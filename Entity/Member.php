<?php

namespace RaulConti\ClashOfClansBundle\Entity;

use RaulConti\ClashOfClansBundle\Entity\League;

/**
 * Class Member
 * @package RaulConti\ClashOfClansBundle\Entity
 */
class Member
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $role;

    /**
     * @var
     */
    protected $expLevel;

    /**
     * @var
     */
    protected $league;

    /**
     * @var
     */
    protected $trophies;

    /**
     * @var
     */
    protected $clanRank;

    /**
     * @var
     */
    protected $previousClanRank;

    /**
     * @var
     */
    protected $donations;

    /**
     * @var
     */
    protected $donationsReceived;


    public function getName()
    {
        return $this->name;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function getExpLevel()
    {
        return $this->expLevel;
    }

    public function getLeague()
    {
        return $this->league;
    }

    public function getTrophies()
    {
        return $this->trophies;
    }

    public function getClanRank()
    {
        return $this->clanRank;
    }

    public function getPreviousClanRank()
    {
        return $this->previousClanRank;
    }

    public function getDonations()
    {
        return $this->donations;
    }

    public function getDonationsReceived()
    {
        return $this->donationsReceived;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setExpLevel($expLevel)
    {
        $this->expLevel = $expLevel;
    }

    /**
     * @param League $league
     */
    public function setLeague(League $league)
    {
        $this->league = $league;
    }

    public function setTrophies($trophies)
    {
        $this->trophies = $trophies;
    }

    public function setClanRank($clanRank)
    {
        $this->clanRank = $clanRank;
    }

    public function setPreviousClanRank($previousClanRank)
    {
        $this->previousClanRank = $previousClanRank;
    }

    public function setDonations($donations)
    {
        $this->donations = $donations;
    }

    public function setDonationsReceived($donationsReceived)
    {
        $this->donationsReceived = $donationsReceived;
    }

}
