<?php

namespace Tests\Api\Universe;

use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\Universe\UniverseNames;
use PHPUnit\Framework\TestCase;

class UniverseNamesTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $api = UniverseNames::v3([500010]);
        $res = $api->get();
        $this->assertSame('faction', $res[0]->category);
        $this->assertSame('古斯塔斯海盗', $res[0]->name);
    }
}
