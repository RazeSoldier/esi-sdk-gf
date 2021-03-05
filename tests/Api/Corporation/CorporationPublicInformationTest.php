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

namespace Tests\Api\Corporation;

use RazeSoldier\SerenityEsi\Api\Corporation\CorporationPublicInformation;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\EsiServiceFactory;

class CorporationPublicInformationTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $api = CorporationPublicInformation::latest(1000001);
        $resp = $api->get();
        $this->assertSame(3000001, $resp->ceo_id);
        $this->assertNull($resp->alliance_id);
        $this->assertSame('Doomheim', $resp->name);
    }

    /**
     * @depends testBasic
     * @throws EsiCallException
     */
    public function testService()
    {
        $info = EsiServiceFactory::make()->getCorporationPublicInformation(1000001);
        $this->assertSame(3000001, $info->ceo_id);
    }
}
