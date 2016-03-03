<?php

namespace RaulConti\ClashOfClansBundle\Services\HttpClient;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use RaulConti\ClashOfClansBundle\Services\HttpClient\HttpClientInterface;

/**
 * Class HttpClient
 * @package RaulConti\ClashOfClansBundle\Services\HttpClient
 */
class HttpClient implements HttpClientInterface
{
    private $guzzle;

    public function __construct($apiKey, $baseUrl)
    {
        $this->apiKey = $apiKey;
        $this->baseUrl = $baseUrl;
        $this->guzzle = new Client(['base_uri' => $this->getBaseUrl()]);
    }

    /**
     * Request to Clash of Clans API using Guzzle
     * @param $path
     * @return array|mixed
     */
    public function request($path)
    {
        try {
            $response = $this->getGuzzle()
                ->request('GET', $path, ['headers' => ['Authorization' => 'Bearer ' . $this->getApiKey()]]);

            $response = json_decode($response->getBody()->getContents(), true);

            return $response;

        } catch(RequestException $e) {
            $error = json_decode($e->getResponse()->getBody(), true);
            echo $error['message'];
        }

        return array();
    }

    private function getGuzzle()
    {
        return $this->guzzle;
    }

    private function getApiKey()
    {
        return $this->apiKey;
    }

    private function getBaseUrl()
    {
        return $this->baseUrl;
    }

}
