<?php

namespace Tests\Api\Universe;

use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\Universe\StructureInformation;
use PHPUnit\Framework\TestCase;
use Tests\TestAuthApi;

class StructureInformationTest extends TestCase
{
    use TestAuthApi;

    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $api = StructureInformation::latest(1014904893446);
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $result = $api->get();
        $this->assertSame(30003392, $result->solar_system_id);
        $this->assertSame(35825, $result->type_id);
    }

    public function testForbidden()
    {
        $this->expectException(EsiCallException::class);
        $this->expectExceptionMessage('{"error":"Forbidden"}');
        $api = StructureInformation::latest(1014697947053);
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $api->get();
    }
}
