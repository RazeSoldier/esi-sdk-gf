<?php

namespace Tests\Api\Character;

use RazeSoldier\SerenityEsi\Api\Character\CharacterNotifications;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use Tests\TestAuthApi;

class CharacterNotificationsTest extends TestCase
{
    use TestAuthApi;

    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $this->checkAuthOrSkip();

        $api = CharacterNotifications::latest($this->getAuthCharacterId());
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $result = $api->get();
        $this->assertCount(1, $result);
        $this->assertSame('KillReportVictim', $result[0]->type);
    }
}
