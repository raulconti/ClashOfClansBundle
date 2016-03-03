<?php

namespace RaulConti\ClashOfClansBundle\Entity;

use RaulConti\ClashOfClansBundle\Entity\Location;
use RaulConti\ClashOfClansBundle\Entity\Member;

/**
 * Class Clan
 * @package RaulConti\ClashOfClansBundle\Entity
 */
class Clan
{
    /**
     * @var
     */
    protected $tag;

    /**
     * @var
     */
    protected $name;

    /**
     * @var
     */
    protected $type;

    /**
     * @var
     */
    protected $description;

    /**
     * @var
     */
    protected $location;

    /**
     * @var
     */
    protected $badgeUrls;

    /**
     * @var
     */
    protected $warFrequency;

    /**
     * @var
     */
    protected $clanLevel;

    /**
     * @var
     */
    protected $warWins;

    /**
     * @var
     */
    protected $clanPoints;

    /**
     * @var
     */
    protected $requiredTrophies;

    /**
     * @var
     */
    protected $members;

    /**
     * @var
     */
    protected $memberList;

    /**
     * @var
     */
    protected $rank;

    /**
     * @var
     */
    protected $previousRank;


    public function getTag()
    {
        return $this->tag;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getBadgeUrls()
    {
        return $this->badgeUrls;
    }

    public function getWarFrequency()
    {
        return $this->warFrequency;
    }

    public function getClanLevel()
    {
        return $this->clanLevel;
    }

    public function getWarWins()
    {
        return $this->warWins;
    }

    public function getClanPoints()
    {
        return $this->clanPoints;
    }

    public function getRequiredTrophies()
    {
        return $this->requiredTrophies;
    }

    public function getMembers()
    {
        return $this->members;
    }

    public function getMemberList()
    {
        return $this->memberList;
    }

    public function getRank()
    {
        return $this->rank;
    }

    public function getPreviousRank()
    {
        return $this->previousRank;
    }

    public function setTag($tag)
    {
        $this->tag = $tag;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param Location $location
     */
    public function setLocation(Location $location)
    {
        $this->location = $location;
    }

    public function setBadgeUrls($badgeUrls)
    {
        $this->badgeUrls = $badgeUrls;
    }

    public function setWarFrequency($warFrequency)
    {
        $this->warFrequency = $warFrequency;
    }

    public function setClanLevel($clanLevel)
    {
        $this->clanLevel = $clanLevel;
    }

    public function setWarWins($warWins)
    {
        $this->warWins = $warWins;
    }

    public function setClanPoints($clanPoints)
    {
        $this->clanPoints = $clanPoints;
    }

    public function setRequiredTrophies($requiredTrophies)
    {
        $this->requiredTrophies = $requiredTrophies;
    }

    public function setMembers($members)
    {
        $this->members = $members;
    }

    public function setMemberList($memberList)
    {
        $this->memberList = $memberList;
    }

    /**
     * @param Member $memberList
     */
    public function addMemberList(Member $memberList)
    {
        $this->memberList[] = $memberList;
    }

    public function setRank($rank)
    {
        $this->rank = $rank;
    }

    public function setPreviousRank($previousRank)
    {
        $this->previousRank = $previousRank;
    }

    /**
     * Get an array of Admin members
     * @return array
     */
    public function getAdmins()
    {
        $admins = array();

        foreach($this->getMemberList() as $member) {
            if ($member->getRole() == "admin") {
                $admins[] = $member;
            }
        }

        return $admins;
    }

    /**
     * Get clan leader
     * @return object|null
     */
    public function getLeader()
    {
        $leader = null;

        foreach($this->getMemberList() as $member) {
            if ($member->getRole() == "leader") {
                $leader = $member;
                break;
            }
        }

        return $leader;
    }

    /**
     * Get an array of CoLeader members
     * @return array
     */
    public function getCoLeaders()
    {
        $coleaders = array();

        foreach($this->getMemberList() as $member) {
            if ($member->getRole() == "coLeader") {
                $coleaders[] = $member;
            }
        }

        return $coleaders;
    }
}
