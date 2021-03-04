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

namespace RazeSoldier\SerenityEsi\Model\Assets;

/**
 * 角色资产的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Assets\CharacterAssets
 * @see https://esi.evepc.163.com/ui/#/Assets/get_characters_character_id_assets
 * @package RazeSoldier\SerenityEsi\Model\Assets
 */
class CharacterAsset
{
    public ?bool $is_blueprint_copy = null;
    public bool $is_singleton;
    public int $item_id;
    public string $location_flag;
    public string $location_id;
    /**
     * @var string Enum: [station, solar_system, item, other]
     */
    public string $location_type;
    public int $quantity;
    public int $type_id;
}
