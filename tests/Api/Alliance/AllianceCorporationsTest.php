<?php

namespace Tests\Api\Alliance;

use RazeSoldier\SerenityEsi\Api\Alliance\AllianceCorporations;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;

class AllianceCorporationsTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $api = AllianceCorporations::v2(562593865);
        $result = $api->get();
        $this->assertIsArray($result);
    }
}
