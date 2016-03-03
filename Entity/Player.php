<?php

namespace RaulConti\ClashOfClansBundle\Entity;

/**
 * Class Player
 * @package RaulConti\ClashOfClansBundle\Entity
 */
class Player
{
    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $expLevel;

    /**
     * @var
     */
    protected $trophies;

    /**
     * @var
     */
    protected $attackWins;

    /**
     * @var
     */
    protected $defenseWins;

    /**
     * @var
     */
    protected $rank;

    /**
     * @var
     */
    protected $previousRank;

    /**
     * @var
     */
    protected $clan;

    /**
     * @var
     */
    protected $league;


    public function getName()
    {
        return $this->name;
    }

    public function getExpLevel()
    {
        return $this->expLevel;
    }

    public function getTrophies()
    {
        return $this->trophies;
    }

    public function getAttackWins()
    {
        return $this->attackWins;
    }

    public function getDefenseWins()
    {
        return $this->defenseWins;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getPreviousRank()
    {
        return $this->previousRank;
    }

    public function getClan()
    {
        return $this->clan;
    }

    public function getLeague()
    {
        return $this->league;
    }


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setExpLevel($expLevel)
    {
        $this->expLevel = $expLevel;
    }

    public function setTrophies($trophies)
    {
        $this->trophies= $trophies;
    }

    public function setAttackWins($attackWins)
    {
        $this->attackWins = $attackWins;
    }

    public function setDefenseWins($defenseWins)
    {
        $this->defenseWins = $defenseWins;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    public function setPreviousRank($previousRank)
    {
        $this->previousRank = $previousRank;
    }

    public function setClan($clan)
    {
        $this->clan = $clan;
    }

    public function setLeague($league)
    {
        $this->league = $league;
    }

}
