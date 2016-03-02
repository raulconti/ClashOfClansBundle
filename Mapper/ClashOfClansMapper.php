<?php

namespace RaulConti\ClashOfClansBundle\Mapper;

use RaulConti\ClashOfClansBundle\Entity\Clan;
use RaulConti\ClashOfClansBundle\Entity\Location;
use RaulConti\ClashOfClansBundle\Entity\Member;
use RaulConti\ClashOfClansBundle\Entity\Player;
use RaulConti\ClashOfClansBundle\Entity\League;

/**
 * Map json responses with the corresponding entity
 * @package RaulConti\ClashOfClansBundle\Mapper
 */
class ClashOfClansMapper
{
    /**
     * Map clans data
     * @param $items
     * @return array
     */
    public function mapClans($items)
    {
        $clans = array();

        foreach((array)$items as $clan) {
            $clans[] = $this->mapClan($clan);
        }

        return $clans;
    }

    /**
     * Map clan data
     * @param $clan
     * @return Clan
     */
    public function mapClan($clan)
    {
        $entity = new Clan();

        $entity->setTag(
            isset($clan['tag']) ? $clan['tag'] : null
        );
        $entity->setName(
            isset($clan['name']) ? $clan['name'] : null
        );
        $entity->setType(
            isset($clan['type']) ? $clan['type'] : null
        );
        $entity->setDescription(
            isset($clan['description']) ? $clan['description'] : null
        );

        if (isset($clan['location'])) {
            $location = $this->mapLocation($clan['location']);
            $entity->setLocation($location);
        }

        $entity->setBadgeUrls(
            isset($clan['badgeUrls']) ? $clan['badgeUrls'] : null
        );
        $entity->setWarFrequency(
            isset($clan['warFrequency']) ? $clan['warFrequency'] : null
        );
        $entity->setClanLevel(
            isset($clan['clanLevel']) ? $clan['clanLevel'] : null
        );
        $entity->setWarWins(
            isset($clan['warWins']) ? $clan['warWins'] : null
        );
        $entity->setClanPoints(
            isset($clan['clanPoints']) ? $clan['clanPoints'] : null
        );
        $entity->setRequiredTrophies(
            isset($clan['requiredTrophies']) ? $clan['requiredTrophies'] : null
        );
        $entity->setMembers(
            isset($clan['members']) ? $clan['members'] : null
        );

        if (isset($clan['memberList'])){
            foreach($clan['memberList'] as $member) {
                $entity->addMemberList( $this->mapMemberList($member) );
            }
        }

        $entity->setRank(
            isset($clan['rank']) ? $clan['rank'] : null
        );

        $entity->setPreviousRank(
            isset($clan['previousRank']) ? $clan['previousRank'] : null
        );

        return $entity;
    }

    /**
     * Map clan members data
     * @param $items
     * @return array
     */
    public function mapMembersClan($items)
    {
        $members = array();
        foreach((array)$items as $member) {
            $members[] = $this->mapMemberList($member);
        }

        return $members;
    }

    /**
     * Map clan member data
     * @param $memberList
     * @return Member
     */
    public function mapMemberList($memberList)
    {
        $entity = new Member();

        $entity->setName(
            isset($memberList['name']) ? $memberList['name'] : null
        );
        $entity->setRole(
            isset($memberList['role']) ? $memberList['role'] : null
        );
        $entity->setExpLevel(
            isset($memberList['expLevel']) ? $memberList['expLevel'] : null
        );

        if(isset($memberList['league'])){
            $league = $this->mapLeague($memberList['league']);
            $entity->setLeague($league);
        }

        $entity->setTrophies(
            isset($memberList['trophies']) ? $memberList['trophies'] : null
        );
        $entity->setClanRank(
            isset($memberList['clanRank']) ? $memberList['clanRank'] : null
        );
        $entity->setPreviousClanRank(
            isset($memberList['previousClanRank']) ? $memberList['previousClanRank'] : null
        );
        $entity->setDonations(
            isset($memberList['donations']) ? $memberList['donations'] : null
        );
        $entity->setDonationsReceived(
            isset($memberList['donationsReceived']) ? $memberList['donationsReceived'] : null
        );

        return $entity;
    }

    /**
     * Map locations data
     * @param $items
     * @return array
     */
    public function mapLocations($items)
    {
        $locations = array();

        foreach((array)$items as $location) {
            $locations[] = $this->mapLocation($location);
        }

        return $locations;
    }

    /**
     * Map location data
     * @param $location
     * @return Location
     */
    public function mapLocation($location)
    {
        $entity = new Location();

        $entity->setId(
            isset($location['id']) ? $location['id'] : null
        );
        $entity->setName(
            isset($location['name']) ? $location['name'] : null
        );
        $entity->setIsCountry(
            isset($location['isCountry']) ? $location['isCountry'] : null
        );
        $entity->setCountryCode(
            isset($location['countryCode']) ? $location['countryCode'] : null
        );

        return $entity;
    }

    /**
     * Map players data
     * @param $items
     * @return array
     */
    public function mapPlayers($items)
    {
        $players = array();

        foreach((array)$items as $player) {
            $players[] = $this->mapPlayer($player);
        }

        return $players;
    }

    /**
     * Map player data
     * @param $player
     * @return Player
     */
    public function mapPlayer($player)
    {
        $entity = new Player();

        $entity->setName(
            isset($player['name']) ? $player['name'] : null
        );
        $entity->setExpLevel(
            isset($player['expLevel']) ? $player['expLevel'] : null
        );
        $entity->setTrophies(
            isset($player['trophies']) ? $player['trophies'] : null
        );
        $entity->setAttackWins(
            isset($player['attackWins']) ? $player['attackWins'] : null
        );
        $entity->setDefenseWins(
            isset($player['defenseWins']) ? $player['defenseWins'] : null
        );
        $entity->setRank(
            isset($player['rank']) ? $player['rank'] : null
        );
        $entity->setPreviousRank(
            isset($player['previousRank']) ? $player['previousRank'] : null
        );
        $entity->setClan(
            isset($player['clan']) ? $player['clan'] : null
        );
        $entity->setLeague(
            isset($player['league']) ? $player['league'] : null
        );

        return $entity;
    }

    /**
     * Map leagues data
     * @param $items
     * @return array
     */
    public function mapLeagues($items)
    {
        $leagues = array();

        foreach((array)$items as $league) {
            $leagues[] = $this->mapLeague($league);
        }

        return $leagues;
    }

    /**
     * Map league data
     * @param $league
     * @return League
     */
    public function mapLeague($league)
    {
        $entity = new League();

        $entity->setId(
            isset($league['id']) ? $league['id'] : null
        );
        $entity->setName(
            isset($league['name']) ? $league['name'] : null
        );
        $entity->setIconUrls(
            isset($league['iconUrls']) ? $league['iconUrls'] : null
        );

        return $entity;
    }

}