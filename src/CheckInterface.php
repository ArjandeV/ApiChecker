<?php

namespace ApiChecker;

use GuzzleHttp\Client;

interface CheckInterface
{
	public function __construct(array $requests);

	public function run(Client $client);
}
