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

namespace RazeSoldier\SerenityEsi\Api\Contract;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Api\Pageable;
use RazeSoldier\SerenityEsi\Api\PageableImp;

/**
 * 获得对角色可用的合同清单
 * <pre>
 * Returns contracts available to a character, only if the character is issuer, acceptor or assignee.
 * Only returns contracts no older than 30 days, or if the status is "in_progress".
 *
 * Route: /v1/characters/{character_id}/contracts/
 * Cached for up 300 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Contract
 * @method \RazeSoldier\SerenityEsi\Model\Contract\CharacterContract[]|null get()
 */
class CharacterContract extends AuthEsiBase implements Pageable
{
    use PageableImp;

    protected string $endpoint = 'characters/{character_id}/contracts';

    public static function v1(int $characterId): self
    {
        $api = new self();
        $api->version = 'v1';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId)
    {
        return self::v1($characterId);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Contract\CharacterContract::class;
    }

    public function getScope(): string
    {
        return 'esi-contracts.read_character_contracts.v1';
    }
}
