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

namespace RazeSoldier\SerenityEsi\Api\Fleet;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;

/**
 * 获得角色所在的舰队信息
 * <pre>
 * Return the fleet ID the character is in, if any.
 * This route is cached for up to 60 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Fleet
 * @method \RazeSoldier\SerenityEsi\Model\Fleet\CharacterFleetInfo get()
 */
class CharacterFleetInfo extends AuthEsiBase
{
    protected string $endpoint = 'characters/{character_id}/fleet';

    public static function latest(int $characterID): self
    {
        return self::v2($characterID);
    }

    public static function v2(int $characterID): self
    {
        $api = new self();
        $api->version = 'v2';
        $api->paramMap['character_id'] = $characterID;
        return $api;
    }

    public function getScope(): string
    {
        return 'esi-fleets.read_fleet.v1';
    }

    protected function getModelClassName(): ?string
    {
        return \RazeSoldier\SerenityEsi\Model\Fleet\CharacterFleetInfo::class;
    }
}
