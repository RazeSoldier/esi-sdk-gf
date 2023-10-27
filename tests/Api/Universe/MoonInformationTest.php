<?php

namespace Tests\Api\Universe;

use RazeSoldier\SerenityEsi\Api\Universe\MoonInformation;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Model\Universe\Position;

class MoonInformationTest extends TestCase
{
    /**
     * @throws \RazeSoldier\SerenityEsi\Api\EsiCallException
     */
    public function testBasic()
    {
        $api = MoonInformation::latest(40276138);
        $res = $api->get();
        $this->assertSame('3-N3OO 6 - Moon 16', $res->name);
        $this->assertSame(30004358, $res->system_id);
        $this->assertInstanceOf(Position::class, $res->position);
    }
}
