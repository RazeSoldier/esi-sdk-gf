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

namespace Tests\Api\Alliance;

use RazeSoldier\SerenityEsi\Api\Alliance\AlliancePublicInformation;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;

class AlliancePublicInformationTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $api = AlliancePublicInformation::latest(562593865);
        $res = $api->get();
        $this->assertSame(788208597, $res->creator_corporation_id);
        $this->assertSame(102149490, $res->creator_id);
        $this->assertSame('VENI VIDI VICI', $res->name);
        $this->assertSame('-VVV-', $res->ticker);
    }
}
