<?php

namespace RaulConti\ClashOfClansBundle\Services\HttpClient;

/**
 * Interface HttpClientInterface
 * @package RaulConti\ClashOfClansBundle\Services\HttpClient
 */
interface HttpClientInterface
{
    public function request($path);
}