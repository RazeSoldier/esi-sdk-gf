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

namespace RazeSoldier\SerenityEsi\Api\Assets;

use RazeSoldier\SerenityEsi\Api\AuthEsiBase;
use RazeSoldier\SerenityEsi\Api\Pageable;
use RazeSoldier\SerenityEsi\Api\PageableImp;
use RazeSoldier\SerenityEsi\Model\Assets\CharacterAsset;

/**
 * 获得角色的资产列表
 * <pre>
 * Return a list of the characters assets
 * Route: /v5/characters/{character_id}/assets/
 * This route is cached for up to 3600 seconds
 * </pre>
 * @package RazeSoldier\SerenityEsi\Api\Assets
 * @method CharacterAsset[] get()
 */
class CharacterAssets extends AuthEsiBase implements Pageable
{
    use PageableImp;

    protected string $endpoint = 'characters/{character_id}/assets';

    public static function v5(int $characterId): self
    {
        $api = new self();
        $api->version = 'v5';
        $api->paramMap['character_id'] = $characterId;
        return $api;
    }

    public static function latest(int $characterId): self
    {
        return self::v5($characterId);
    }

    public function getScope(): string
    {
        return 'esi-assets.read_assets.v1';
    }

    protected function getModelClassName(): ?string
    {
        return CharacterAsset::class;
    }
}
