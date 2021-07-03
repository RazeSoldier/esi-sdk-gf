<?php

namespace Tests\Api\Corporation;

use RazeSoldier\SerenityEsi\Api\Corporation\CorporationStructures;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Model\Corporation\CorporationStructureService;
use Tests\TestAuthApi;

class CorporationStructuresTest extends TestCase
{
    use TestAuthApi;

    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $this->checkAuthOrSkip();

        $api = CorporationStructures::latest(98028227);
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $res = $api->get();
        $this->assertInstanceOf(CorporationStructureService::class, $res[0]->services[0]);
    }
}
