Clash of Clans API Bundle for Symfony
============

Bundle to connect to Clash of Clans API

Installation
------------

### Step 1: Download the Bundle

```bash
$ composer require raulconti/clash-of-clans-bundle 
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Step 2: Enable the Bundle

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new RaulConti\ClashOfClansBundle\ClashOfClansBundle(),
        );

        // ...
    }

    // ...
}
```

Usage
------------

### Get an API Key

You need to obtain an API key at https://developer.clashofclans.com/#/ and add it in the  `app/config/config.yml` file:

```yaml
# app/config/config.yml
clash_of_clans:
    api_key: <api_key>
```

### API Search

Get instance of api via the service container:

```php
$api = $this->get('clash_of_clans.api');
```

Get clans filtering by name and war frequency:

```php
$clans = $api->getClans(array(
    'name' => 'spain',
    'warFrequency' => 'always'
));
```

Get info about a single clan:

```php
$clan = $api->getClan('#QV22JCY');
```

Get clan leader:

```php
$leader = $api->getClan('#QV22JCY')->getLeader();
```

List clan members:

```php
$members = $api->getMembersClan('#QV22JCY');
```

Get clans ranking for a specific location:

```php
$ranking = $api->getRankingLocations('32000218');
```
