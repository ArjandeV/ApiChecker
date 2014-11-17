<?php

include('vendor/autoload.php');

use \GuzzleHttp\Client as GuzzleClient;

$client = new GuzzleClient();

$apiChecker = new \ApiChecker\ApiChecker($client);
$apiChecker->registerCheck(new ApiChecker\Checks\Ping([
	$client->createRequest('GET', 'http://google.com'),
	$client->createRequest('GET', 'http://bitbucket.org'),
	$client->createRequest('GET', 'http://github.com'),
]));
$results = $apiChecker->run();
var_dump($results);
