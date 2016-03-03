<?php

namespace RaulConti\ClashOfClansBundle\Services;

use GuzzleHttp;
use RaulConti\ClashOfClansBundle\Services\HttpClient\HttpClientInterface;
use RaulConti\ClashOfClansBundle\Mapper\ClashOfClansMapper;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class ApiClient
 * @package RaulConti\ClashOfClansBundle\Services
 */
class ApiClient
{
    private $httpClient;
    private $mapper;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
        $this->mapper = new ClashOfClansMapper();
    }

    /**
     * Search all clans by name and/or filtering the results using varios criteria
     * @param $params
     * @return array
     */
    public function getClans($params)
    {
        $params = $this->resolveClanOptions($params);

        $params = http_build_query($params);

        $response = $this->getHttpClient()->request('clans?' . $params);

        return $this->mapper->mapClans($response['items']);
    }

    /**
     * Get information about a single clan by clan tag
     * @param $tag
     * @return \RaulConti\ClashOfClansBundle\Entity\Clan
     */
    public function getClan($clanTag)
    {
        $response = $this->getHttpClient()->request('clans/' . urlencode($clanTag));

        return $this->mapper->mapClan($response);
    }

    /**
     * List clan members
     * @param $tag
     * @return array
     */
    public function getMembersClan($clanTag)
    {
        $response = $this->getHttpClient()->request('clans/' . urlencode($clanTag) . '/members');

        return $this->mapper->mapMembersClan($response['items']);
    }

    /**
     * List all available locations
     * @return array
     */
    public function getLocations()
    {
        $response = $this->getHttpClient()->request('locations');

        return $this->mapper->mapLocations($response['items']);
    }

    /**
     * Get information about specific location
     * @param $locationId
     * @return \RaulConti\ClashOfClansBundle\Entity\Location
     */
    public function getLocation($locationId)
    {
        $response = $this->getHttpClient()->request('locations/' . urlencode($locationId));

        return $this->mapper->mapLocation($response);
    }

    /**
     * Get rankings for a specific location
     * @param $locationId
     * @param string $rankingId
     * @return array
     */
    public function getRankingLocations($locationId, $rankingId = "clans")
    {
        $response = $this->getHttpClient()->request(
            'locations/' . urlencode($locationId) . '/rankings/' . urlencode($rankingId)
        );

        switch($rankingId) {
            case 'clans':
                return $this->mapper->mapClans($response['items']);
                break;
            case 'players':
                return $this->mapper->mapPlayers($response['items']);
        }
    }

    /**
     * Get list of leagues
     * @return array
     */
    public function getLeagues()
    {
        $response = $this->getHttpClient()->request('leagues');

        return $this->mapper->mapLeagues($response['items']);
    }


    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * Resolve clans options
     * @param $params
     * @return array
     */
    private function resolveClanOptions($params)
    {
        $resolver = new OptionsResolver();

        $resolver->setDefined('name');
        $resolver->setDefined('warFrequency');
        $resolver->setDefined('locationId');
        $resolver->setDefined('minMembers');
        $resolver->setDefined('maxMembers');
        $resolver->setDefined('minClanPoints');
        $resolver->setDefined('minClanLevel');
        $resolver->setDefined('limit');
        $resolver->setDefined('after');
        $resolver->setDefined('before');

        $resolver->setAllowedTypes('name', array('null', 'string'));
        $resolver->setAllowedValues('warFrequency', array(
            null, 'always', 'moreThanOncePerWeek', 'oncePerWeek', 'lessThanOncePerWeek', 'never', 'unknown'
        ));
        $resolver->setAllowedTypes('locationId', array('null', 'int'));
        $resolver->setAllowedTypes('minMembers', array('null', 'int'));
        $resolver->setAllowedTypes('maxMembers', array('null', 'int'));
        $resolver->setAllowedTypes('minClanPoints', array('null', 'int'));
        $resolver->setAllowedTypes('minClanLevel', array('null', 'int'));
        $resolver->setAllowedTypes('limit', array('null', 'int'));
        $resolver->setAllowedTypes('after', array('null', 'int'));
        $resolver->setAllowedTypes('before', array('null', 'int'));

        $params = $resolver->resolve($params);

        return $params;
    }
}
