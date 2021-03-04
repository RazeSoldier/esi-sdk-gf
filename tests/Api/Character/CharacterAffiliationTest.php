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

use RazeSoldier\SerenityEsi\Api\Character\CharacterAffiliation;
use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RazeSoldier\SerenityEsi\EsiServiceFactory;

class CharacterAffiliationTest extends TestCase
{
    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $obj = CharacterAffiliation::latest([2112259363])->get();
        $this->assertCount(1, $obj);
        $this->assertSame(2112259363, $obj[0]->character_id);
    }

    /**
     * @depends testBasic
     * @throws EsiCallException
     */
    public function testWithService()
    {
        $obj = EsiServiceFactory::make()->getCharacterAffiliation([2112259363]);
        $this->assertCount(1, $obj);
        $this->assertSame(2112259363, $obj[0]->character_id);
    }
}
