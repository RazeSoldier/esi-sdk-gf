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

namespace Tests\Api\Universe;

use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\Api\Universe\TypeInformation;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\EsiServiceFactory;

class TypeInformationTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $res = TypeInformation::latest(40635)->get();
        $this->assertEquals(8000, $res->volume);
        $this->assertTrue($res->published);
        $this->assertSame('停滞缠绕脉冲波投射器', $res->name);
    }

    /**
     * @throws EsiCallException
     */
    public function testEnResponse()
    {
        $res = TypeInformation::latest(40635, 'en')->get();
        $this->assertSame('Stasis Webification Burst Projector', $res->name);
    }

    /**
     * @depends testBasic
     * @throws EsiCallException
     */
    public function testService()
    {
        $res = EsiServiceFactory::make()->getUniverseType(40635);
        $this->assertSame('停滞缠绕脉冲波投射器', $res->name);
    }
}
