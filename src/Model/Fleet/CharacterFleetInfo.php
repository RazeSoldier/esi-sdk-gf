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

namespace RazeSoldier\SerenityEsi\Model\Fleet;

/**
 * 代表角色所在舰队的信息
 * @see \RazeSoldier\SerenityEsi\Api\Fleet\CharacterFleetInfo
 * @see https://esi.evepc.163.com/ui/?version=dev#/Fleets/get_characters_character_id_fleet
 * @package RazeSoldier\SerenityEsi\Model\Fleet
 */
class CharacterFleetInfo
{
    /**
     * @var int Character ID of the current fleet boss
     */
    public int $fleet_boss_id;
    /**
     * @var int The character’s current fleet ID
     */
    public int $fleet_id;
    /**
     * @var string Member’s role in fleet. [fleet_commander, squad_commander, squad_member, wing_commander]
     */
    public string $role;
    /**
     * @var int ID of the squad the member is in. If not applicable, will be set to -1
     */
    public int $squad_id;
    /**
     * @var int ID of the wing the member is in. If not applicable, will be set to -1
     */
    public int $wing_id;
}
