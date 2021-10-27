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

namespace RazeSoldier\SerenityEsi\Api\Character;

use RazeSoldier\SerenityEsi\Api\EsiBase;
use RazeSoldier\SerenityEsi\Api\PublicApi;

/**
 * 获得角色公开信息
 * <pre>
 * Public information about a character
 * Route: /v5/characters/{character_id}/
 * Cached for up 86400 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Character
 *
 * @method \RazeSoldier\SerenityEsi\Model\Character\CharacterPublicInformation get()
 */
class CharacterPublicInformation extends EsiBase implements PublicApi
{
    protected string $endpoint = 'characters/{character_id}';

    public static function v5(int $characterId): self
    {
        $api = new self;
        $api->version = 'v5';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId): self
    {
        return self::v5($characterId);
    }

    protected function getModelClassName(): string
    {
        return \RazeSoldier\SerenityEsi\Model\Character\CharacterPublicInformation::class;
    }
}
