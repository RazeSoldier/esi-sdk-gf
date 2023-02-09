<?php

namespace Tests\Api\Mail;

use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\Mail\MailHeaders;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Model\Mail\MailHeader;
use Tests\TestAuthApi;

class MailHeadersTest extends TestCase
{
    use TestAuthApi;

    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $this->checkAuthOrSkip();

        $api = MailHeaders::v1($this->getAuthCharacterId(), null, 79054316);
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $res = $api->get();
        $this->assertIsArray($res);
        $this->assertInstanceOf(MailHeader::class, $res[0]);
    }
}
