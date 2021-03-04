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

namespace RazeSoldier\SerenityEsi\Api\Location;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 角色的当前位置信息
 * <pre>
 * Information about the characters current location. Returns the current solar system id, and also the current station or structure ID if applicable
 * Route: /v2/characters/{character_id}/location/
 * This route is cached for up to 5 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Location
 * @method \RazeSoldier\SerenityEsi\Model\Location\CharacterLocation get()
 */
class CharacterLocation extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/location';

    public static function v2(int $characterId): self
    {
        $api = new self();
        $api->version = 'v2';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId): self
    {
        return self::v2($characterId);
    }

    public function getScope(): string
    {
        return 'esi-location.read_location.v1';
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Location\CharacterLocation::class;
    }
}
