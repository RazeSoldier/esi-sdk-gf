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

namespace RazeSoldier\SerenityEsi\Model\Location;

/**
 * 角色当前舰船信息的模型类
 * @see \RazeSoldier\SerenityEsi\Api\Location\CharacterShip
 * @see https://esi.evepc.163.com/ui/#/Location/get_characters_character_id_ship
 * @package RazeSoldier\SerenityEsi\Model\Location
 */
class CharacterShip
{
    /**
     * @var int Item id’s are unique to a ship and persist until it is repackaged.
     *             This value can be used to track repeated uses of a ship,
     *             or detect when a pilot changes into a different instance of the same ship type.
     */
    public int $ship_item_id;
    public string $ship_name;
    public int $ship_type_id;
}
