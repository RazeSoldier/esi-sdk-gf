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

namespace Tests\Api\Contract;

use PHPUnit\Framework\TestCase;
use RazeSoldier\SerenityEsi\Api\Contract\CharacterContract;
use RazeSoldier\SerenityEsi\Api\EsiCallException;
use RuntimeException;
use Tests\TestAuthApi;

class CharacterContractTest extends TestCase
{
    use TestAuthApi;

    /**
     * @throws EsiCallException
     */
    public function testBasic()
    {
        $this->checkAuthOrSkip();

        $api = CharacterContract::latest($this->getAuthCharacterId());
        $api->setAccessToken($this->getAccessToken($api->getScope()));
        $this->assertNull($api->get());
    }

    /**
     * @throws EsiCallException
     */
    public function testFail()
    {
        $this->expectException(RuntimeException::class);
        CharacterContract::latest(2112259363)->get();
    }
}
