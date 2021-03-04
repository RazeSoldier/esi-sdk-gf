<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

namespace Tests\Api\Character;

use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\Character\CharacterPublicInformation;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\EsiServiceFactory;

class CharacterPublicInformationTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $obj = CharacterPublicInformation::latest(2112259363)->get();
        $this->assertNull($obj->alliance_id);
        $this->assertSame('2020-06-14T07:45:50Z', $obj->birthday);
    }

    /**
     * @depends testBasic
     * @throws EsiCallException
     */
    public function testWithService()
    {
        $obj = EsiServiceFactory::make()->getCharacterPublicInformation(2112259363);
        $this->assertNull($obj->alliance_id);
        $this->assertSame('2020-06-14T07:45:50Z', $obj->birthday);
    }

    /**
     * @throws EsiCallException
     */
    public function testFail()
    {
        $this->expectException(EsiCallException::class);
        CharacterPublicInformation::latest(1112259363)->get();
    }

    /**
     * @depends testBasic
     * @throws EsiCallException
     */
    public function testHttpCache()
    {
        $api = CharacterPublicInformation::latest(2112259363);
        $api->get();
        $etag = $api->getETag();
        $this->assertFalse($api->resourceIsNotModified());

        $api = CharacterPublicInformation::latest(2112259363);
        $api->setETag($etag);
        $this->assertNull($api->get());
        $this->assertTrue($api->resourceIsNotModified());
    }
}
